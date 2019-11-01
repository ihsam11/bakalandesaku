<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'register_date',
        'nik',
        'kk_id',
        'name',
        'birth_place',
        'birth_date',
        'address',
        'religion',
        'marriage',
        'job',
        'gender',
        'rt',
        'rw',
        'education',
        'citizenship',
        'lineage',
        'status',
    ];
    
    public function User()
    {
        return $this->hasMany('App\User');
    }
}
