<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use FacebookHelper;
use Illuminate\Support\Facades\Config;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

class FaceBookController extends Controller{
	protected $helper;
	public function __construct(){
		session_start();
		FacebookSession::setDefaultApplication('1473244306316838', '4635d0851d6a69c25f7e1c7520b94849');
		$this->helper = new FacebookRedirectLoginHelper(url('/facebook/callback'));
	}

	public function getLogin(){
		$loginUrl = $this->helper->getLoginUrl('public_profile');
		return Redirect::to($loginUrl);
	}

	public function getCallback(){
		try {
		  $session = $this->helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
		}
		if ($session) {
			$request = new FacebookRequest($session, 'GET', '/me');
			$response = $request->execute();
			$fbuser = $response->getGraphObject();
			if($fbuser){
				return Redirect::to('/facebook/checkuser')->with('sessionfb',$session)
														->with('userfb',$fbuser)
														->withCookie(Cookie::forever('user',$fbuser));
			}
			else{
				dd('Error');
			}
		}
	}

	public function getCheckuser(){
		$sessionfb = Session::get('sessionfb');
		dd($sessionfb);
		$userfb = Session::get('userfb');
		$check= User::checkuser($userfb, $nh);
		
		//kiem tra id nha hang
		//kiem tra check, neu khong co nguoi dung trong db
		if($check==false){
			if(!NhaHang::checkid($nh)){
				return Redirect::to('/error');
			}else{
				DB::beginTransaction();	
				try{
    				$user = User::createuser($userfb, htmlentities($_SERVER['HTTP_USER_AGENT']), $nh);
    				$code = Code::createcode($userfb, $type, $nh);
    				DB::commit();
				}
				//Catch any exceptions that fire in the try block
				catch ( Exception $e ){
    				//If there are any exceptions, rollback the transaction
    				DB::rollback();
				}
				//Everything worked perfectly. Commit the transaction
				$user=$userfb->asArray();
				$user['fb_id']=$user['id'];
				Session::put('user',(object) $user);
    			return Redirect::to('/hello');
			}
		}
		//neu co nguoi dung trong user
		else{
			$user = $check;
			$user->save();
			$c = false;
			$arrs = Code::where('fb_id', $user->fb_id)->get();
			foreach ($arrs as $arr){
    			if($nh == $arr->nhahang_id){
    				$c = true;
    				break;
    			}
			}
			if(!$c){
				$code = Code::createcode($userfb, $type, $nh);
				Session::put('user',$user);
				return Redirect::to('/hello');
			}else{
				Session::put('user',$user);
				return Redirect::to('/hello');
			}
		}
	}

	public function getTest(){
		dd(Cookie::get('user'));
	}

	public function postDaXem(){
		$user= User::where('fbid',Input::get('fbid'))->first();
		$user->first_time = 1;
		$check = $user->save();
		if($check){
			Session::put('user',$user);
			echo 'true';
		}else echo 'false';
	}

	public function getLogout(){
		$cookie = Cookie::forget('user');
		return Redirect::to('/')->withCookie($cookie);
	}
}