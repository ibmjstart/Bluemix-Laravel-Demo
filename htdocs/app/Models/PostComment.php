<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    //
    protected $primaryKey = "comment_event_id";
    protected $table = 'post_comment';
}
