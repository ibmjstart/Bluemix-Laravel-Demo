<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\URL;

class Board extends Model
{
    //
	protected $table = 'boards';
	protected $primaryKey = 'board_id';
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	public function posts()
	{
		return $this->hasMany('App\Models\Post');
	}
	public static function getBoardsByUserId($user_id)
	{
		$boards = User::find($user_id)->boards;
		return $boards;
	}
	public static function createBoard($boardName,$boardDescription=null,$cover_link=null,$user_id)
	{
		$board = new Board();
		$board->title = $boardName;
		$board->description=$boardDescription;
		$board->cover_link=$cover_link;
		$board->user_id = $user_id;
		try {
			$board->save();
		}
		catch(Exception $e)
		{

		}
		return $board;
	}
	public static function getPreviewBoardsByUserId($user_id)
	{
		if(!isset($user_id))
			return;
		$boards = Board::where('user_id',$user_id)->get();
        foreach ($boards as $board){
            $board["preview"] = Board::getPreviewBoard($board["board_id"]);
        }
		return $boards;
	}
    public static function countBoardsByUserId($user_id){
        $boards = Board::where('user_id',$user_id)->count();
        return $boards;
    }
    public static function getBoardById($board_id){
        $board = Board::where("board_id",$board_id)->first();
        $board["preview"] = Board::getPreviewBoard($board_id);
        return $board;
    }
    public static function getPreviewBoard($board_id){
        $list = new \SplFixedArray(4);
        $posts = Post::where('board_id',$board_id)->take(4)->get(['photo_link']);
        for($i=0;$i<count($posts);$i++){
            $list[$i]= url('api/photo'.'/'.$posts[$i]['photo_link']);
        }
        return $list;
    }

}
