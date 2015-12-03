<?php
namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\LikeEvent;
use App\Models\CommentEvent;
use App\Models\UserPosts;
use Auth;
class FrontEndController extends Controller{
	//post login fb
	public function login(Request $request){
		$res = $request->input("response");

		$check = User::CheckUser($res['id']);
		if ($check == false) {
			//tài khoàn fb người dùng chưa đăng kí
			$result = User::CreateUser($res);
			$response = new \Illuminate\Http\Response(view('layout.index'));
			$response->withCookie(cookie()->forever('user', $result));
		}else{
			$response = new \Illuminate\Http\Response(view('layout.index'));
			$response->withCookie(cookie()->forever('user', $check));
		}
	}

	//post upload img
	public function uploadimg(Request $request){
		$img = $request->input("src");

		// $img = str_replace('data:image/png;base64,', '', $img);
		// $img = str_replace(' ', '+', $img);
		// $img= base64_decode($img);
		// $image_name= time().'.jpg';
		// $path = "public/vendors/img/" . $image_name;
		// file_put_contents($path, $img);
	}

	//post upload post
	public function uploadpost(Request $request){
		$board_id = $request->input("board_id");
		$description = $request->input("description");
		$photo_link = '';
		$user_id = '';
		$place_id = $request->input("place_id");
		$hashtag = $request->input("hashtag");

		Post::CreatePost($board_id, $description, $photo_link, $user_id, $place_id, $hashtag);
	}

	//lấy ra thông tin chi tiết của ảnh
	public function detailimage(Request $request){
		$post_id = $request->input("post_id");
		$detail_post = Post::GetDetailPost($post_id);
		dd($detail_post);
	}

	//load more
	public function loadmore(Request $request){
		$skip = $request->session()->get('skip');
		$skip = $skip + 8;

		$data = Post::GetPopularPost(LikeEvent::GetMostPost(), $skip);
		$request->session()->put('skip', $skip);

		return $data;
	}

	//get view trang chủ
	public function mainview(Request $request){
		$request->session()->put('skip', 0);
		if(Auth::check())
			return redirect()->to('home');
		return view('layout.master');
	}

	//get view trang chủ
	public function homeview(Request $request){
		
		$id = Auth::user()->user_id;
        $list = UserPosts::getPostsByFollowingUserId($id);
		return view('mainpage',["posts"=>$list]);
	}

	//get view tìm kiem do an
	public function searchfoodview(Request $request){
		return view('map');
	}
}