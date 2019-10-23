<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photograph extends Model
{
    //
    protected $fillable = [ 'title', 'path', 'description', 'status', 'topic_id' ];
}
