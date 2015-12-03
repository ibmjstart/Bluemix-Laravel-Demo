<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLiker extends Model
{
    //
    protected $primaryKey = "like_event_id";
    protected $table = 'post_liker';
}
