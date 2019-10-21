<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\User;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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
        // return response()->json($table);
    }

    public function create()
    {
        //
        return view ('user.userprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Profile::create(
            $request->all()
        );

        return redirect('admin/user')
                ->with('status', 'Data Penduduk berhasil Ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = DB::table('users')
                    ->join('profiles', 'profiles.nik', '=', 'users.nik')
                    ->select('profiles.*', 'users.email as email')          
                    ->where('profiles.id', $profile->id)
                    ->first();
        
        // dd($profile);
        return view('user.editprofile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
