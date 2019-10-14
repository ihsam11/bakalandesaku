<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $fillable = [ 
        'title', 
        'date_start',
        'date_finish',
        'time_start',
        'time_finish',
        'description',
        'display'
    ];
}
