<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    //    
    protected $fillable = [
    	'topic_id', 'image_path', 'title', 'content', 'user_id', 'status', 'display', 'viewer'
    ];
}
