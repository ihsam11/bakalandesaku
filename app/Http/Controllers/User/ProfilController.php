<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Profile;
use \Carbon\Carbon;

class ProfilController extends Controller
{

    public function userchart(){
        
        $get = Profile::select('birth_date')->where('id', 1)->first();
        $now = Carbon::now();
        $b_day = Carbon::parse($get);
        $age = $b_day->diffInYears($now);

        print_r($age);
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
                    ->where('users.id', $profile->id)
                    ->first();
        
        $religion = DB::table('religions')->get();
        $education = DB::table('educations')->get();
        $marriage = DB::table('marriages')->get();
        $lineage = DB::table('lineages')->get();
        $blood_type = DB::table('blood_types')->get();
        
        dd($profile);
        // return view('user.editprofile', compact('profile', 'religion','education', 'marriage', 'lineage', 'blood_type'));
    }

    public function update(){

        

    }
}
