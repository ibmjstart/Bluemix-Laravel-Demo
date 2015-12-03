<?php

namespace App\Http\Controllers;

use App\Models\LikeEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\UserPosts;
use App\Models\CommentEvent;
use Auth;
use Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $post = new Post();
        $post->id = $request->input("id");
        $post->title = "Phở bò";
        $post->description= "Pho 24h ngon tuyet cu meo";
        $cookie = cookie()->forever('userID','345');
        return response()->json($post)->withCookie($cookie);
    }
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!Auth::check())
            return response()->json("Please login");
        $description = $request->input('description');
        $board_id = $request->input('board_id');
        $user_id = Auth::user()->user_id;
        $photo_link = $request->input('photo_link');
        $post = Post::CreatePost($board_id,$description,$photo_link,$user_id,null,null);
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        //
        $post = UserPosts::getPostById($post_id);
        if(Auth::check())
            $post["liked"]=LikeEvent::checkLiked($post["post_id"],Auth::user()->user_id);
        $post["comments"]=Post::getCommentsByPostId($post_id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getLiker($id)
    {
        $result = Post::getLikerByPostId($id);
        return response()->json($result);
    }
    public function getComments($id)
    {
        $result = Post::getCommentsByPostId($id);
        return response()->json($result);
    }
    public function likePost($post_id,$user_id){

    }
//    public function getPostById($post_id)
//    {
//        return view('layout.view');
//    }
}
