<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
define("FOLLOW_USER",1);
define("FOLLOW_BOARD",2);
class FollowEvent extends Model
{
    //
	protected $table = 'follow_event';
	protected $primaryKey = 'follow_event_id';
	public static function checkFollowed($follower,$following)
	{
		$result = FollowEvent::where('follower_id',$follower)->where('following_id',$following)->first();
		if(!$result)
		{
			return false;
		}
		return true;
	}
	public static function followUser($follower,$following)
	{
		$follow_event = new FollowEvent;
		$follow_event["follower_id"] = $follower;
		$follow_event["following_id"] = $following;
		$follow_event["follow_type"] = FOLLOW_USER;
		$follow_event->save();
	}
	public static function unfollowUser($follower,$following)
	{
		$result = FollowEvent::where('follower_id',$follower)->where('following_id',$following)->first();
		return $result->delete();
	}
	public static function getFollowing($user_id)
	{
		$list_id = FollowEvent::where('follower_id',$user_id)->get(['following_id']);
		$result = User::whereIn('user_id',$list_id)->get(['username','name','user_id']);
		return $result;
	}
	public static function getFollower($user_id)
	{
		$list_id = FollowEvent::where('following_id',$user_id)->get(['follower_id']);
		$result = User::whereIn('user_id',$list_id)->get(['username','name','user_id']);
		return $result;
	}
    public static function countFollowing($user_id){
        $number_following_id = FollowEvent::where('follower_id',$user_id)->count();
        return $number_following_id;
    }
    public static function countFollower($user_id){
        $number_following_id = FollowEvent::where('following_id',$user_id)->count();
        return $number_following_id;
    }
}
