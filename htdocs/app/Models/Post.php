<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\LikeEvent;
use App\Models\CommentEvent;
use App\Models\PostComment;
use App\Models\PostLiker;
class Post extends Model{
	protected $table = 'posts';
	public function board()
	{
		return $this->belongsTo('App\Models\Board');
	}
	public static function CreatePost($board_id, $description, $photo_link, $user_id, $place_id, $hashtag){
		$post = new Post();
		$post->description = $description;
		$post->photo_link = $photo_link;
		$post->user_id = $user_id;
		$post->board_id = $board_id;
		$post->place_id = $place_id;
		$post->hashtag = $hashtag;
		$post->save();
	}
	public static function getPostById($post_id)
	{
		if(isset($post_id))
			return Post::where('post_id',$post_id)->first();
	}
	public static function getPostByUserId($user_id)
	{
		if(isset($user_id))
			return Post::where('user_id',$user_id)->get();
	}
	public static function GetPopularPost($arr_postid, $skip){
		$posts = Post::whereIn('post_id', $arr_postid)->skip($skip)->take(8)->get();
		return $posts;
	}

	public static function GetDetailPost($post_id){
		$post = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            ->join('places', 'posts.place_id', '=', 'places.place_id')
            ->join('boards', 'posts.board_id', '=', 'boards.board_id')
            ->select('posts.*', 'users.*', 'places.*', 'boards.*')
            ->where('post_id', $post_id)
            ->first();
	}
    public static function countPostsByUserId($user_id){
        $posts = Post::where('user_id',$user_id)->count();
        return $posts;
    }
    public static function getLikerByPostId($post_id){
        $result = PostLiker::where('post_id',$post_id)->get();
        return $result;
    }
    public static function getCommentsByPostId($post_id){
        $result =  PostComment::where('post_id',$post_id)->get();
        return $result;
    }
}
