<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeEvent extends Model
{
    //
	protected $table = 'like_event';
	protected $primaryKey = "like_event_id";
	public static function GetMostPost(){
		$post_id = LikeEvent::select('post_id')->orderBy('total_like', 'desc')->get();

		$array = array();
		foreach ($post_id as $key => $value) {
			array_push($array, $value['post_id']);
		}

		return $array;
	}
    public static function createLikeEvent($post_id,$user_id){
        $like_event = new LikeEvent;
        $like_event->post_id = $post_id;
        $like_event->user_id = $user_id;
        $like_event->save();
        //trigger to notification board
    }
    public static function removeLikeEvent($like_event_id){
        $result = LikeEvent::where('like_event_id',$like_event_id)->first();
        return $result;
    }
    public static function checkLiked($post_id,$user_id){
        $result = LikeEvent::where('post_id',$post_id)->where('user_id',$user_id)->first();
        if($result){
            return true;
        }
        else return false;
        //trigger to notification board
    }
}
