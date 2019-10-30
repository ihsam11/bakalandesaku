<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProfilController extends Controller
{
    public function userchart(){

        $get = Profile::select('birth_date')->where('id', 1)->json();
        $now = Carbon::now();
        $b_day = Carbon::parse($get);
        $age = $b_day->diffInYears($now);

        dd($b_day);
    }

    public function userdatatable(){

        $table = DB::table('profiles')->select('id', 'nik', 'name', 'gender', DB::RAW('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS usia'), 'address', 'rt', 'rw');

        return datatables()->of($table)->make(true);

    }

    public function edit(Profile $profile)
    {
        $profile = DB::table('users')
                    ->join('profiles', 'profiles.nik', '=', 'users.nik')
                    ->select('profiles.*', 'users.email as email')
                    ->where('profiles.id', $profile->id)
                    ->first();

        return view('user.editprofile', compact('profile'));
    }
}
