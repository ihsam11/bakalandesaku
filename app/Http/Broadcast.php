<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    //
    protected $fillable = [ 'title', 'description', 'active_range', 'user_id' ];
}
