<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PostDetails extends Model
{
    //
    protected $table = 'post_details';
    public static function getDetails($post_id){
        $result = PostDetails::where('post_id',$post_id)->first();
        if($result){
            return $result;
        }
    }
}
