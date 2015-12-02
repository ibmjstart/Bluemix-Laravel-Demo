<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;
use App\Http\Controllers\StorageController;
class LoginController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function callback() {

        $app_id = "1510346915949673";
        $app_secret = "330c492a203540f34ec2ff912c5a1522";
        $redirect_uri = urlencode("http://localhost/laravel-master/public/callback");
        // Get code value
        $code = $_GET['code'];
        // Get access token 
        $facebook_access_token_uri = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $access_token = str_replace('access_token=', '', explode("&", $response)[0]);
        // Get user infomation
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token&fields=id,name,picture"); // lấy id, name, avatar
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $user = json_decode($response);
        // kiểm tra có trong DB hay k 
        $data = DB::table('users')->where('fbid', $user->id)->get();
        if ($data == null) {
//            $member = new User;
//            $member->fbid = $user->id;
//            $member->name=$user->name;
//            $member->avatar_link=$user->picture->data->url;
//            $member->save();
            $id = DB::table('users')->insertGetId(['fbid' => $user->id, 'name' => $user->name, 'avatar_link' => $user->picture->data->url]);
        } else {
            $id = $data[0]->user_id;
            DB::table('users')->where('user_id', $id)->update(['avatar_link' => $user->picture->data->url]);
        }
        echo $id;
    }

    public function register(Request $request) {
        $v = Validator::make($request->all(), [
                    'username' => 'required|unique:users',
                    'name' =>'required',
                    'password' => 'required',
                    'rePassword' => 'required|same:password',
                    'email' => 'required',
                        ], [
                    'username.required' => 'Vui lòng nhập accout',
                    'name.required' => 'Vui lòng nhập họ tên đầy đủ',
                    'password.required' => 'Vui lòng nhập password',
                    'email.required' => 'Vui lòng nhập email',
                    'rePassword.same:password' => 'Mật khẩu nhập lại không đúng, vui lòng kiểm tra lại mật khẩu',
                    'username.unique' => 'Tên đăng nhập đã tồn tại',
                        ]
        );
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        // $id = DB::table('users')->insertGetId(['account' => $request->username, 'name' => $request->name, 'email' => $request->email,'password' => Hash::make($request->password)]);
       $member = new User;
       $member->username = $request->username; 
       $member->email = $request->email;
       $member->password = Hash::make($request->password);
       if($member->save()) {
            $auth = array(
              'email' => $member->email,
              'password' => $member->password
             );
            Auth::attempt($auth,true);
            Storage::makeDirectory($member->user_id.'/'.'tmp');
            return redirect()->to('home');
       };

//        echo "a";
        // echo $id;
    }

    public function login(Request $request) {
         
        $auth = array(
          'email' => $request->email,
          'password' => $request->password
        );
        if (Auth::attempt($auth,true)) {
                return redirect()->route('home');
        } else {
            echo "sai ten mat khau";
        }
        
    }
    public function registerfb(Request $request) {
        $res = $request->input("response");
        $identifier = isset($res['email'])?$res['email']:$res['id'];
        $auth = array(
            'email' => $res['id'],
            'password'=>'password'
        );
        $result = "success";
        if (!Auth::attempt($auth,true)) {
            $member = new User;
            $user_id = DB::table('users')->max('user_id')+1;
            $member->user_id = $user_id;
            $member->username =  $res['id'];
            $member->email = $identifier;
            $member->name = $res["name"];
            $member->password = Hash::make("password");
            $member->description = $res['quotes'];
            Storage::makeDirectory($member->user_id);
            $member->avatar_link = StorageController::getFile($user_id,$res['picture']['data']['url']);
            $member->cover_link = StorageController::getFile($user_id,$res['cover']['source']);
            if($member->save()) {
                Auth::attempt($auth,true);
            }
//            return response()->json(["result"=>$result,'user'=>$member,]);
        }
        return response()->json(["result"=>$result,'success'=>Auth::check()]);
    }
}
