<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FollowEvent;
class UserPosts extends Model
{
    //
    protected $table = "user_posts";
    public static function getPostById($post_id)
	{
		if(isset($post_id))
			return UserPosts::where('post_id',$post_id)->first();
	}
	public static function getPostByUserId($user_id)
	{
		if(isset($user_id))
			return UserPosts::where('user_id',$user_id)->get();
	}
	public static function getPostsByFollowingUserId($user_id)
	{
    	if(isset($user_id))
        {
            $list_id = FollowEvent::where('follower_id',$user_id)->get(['following_id']);
            return UserPosts::whereIn('user_id',$list_id)->get();
        }
	}
}
