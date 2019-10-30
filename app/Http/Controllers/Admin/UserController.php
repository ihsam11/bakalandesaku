<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth,Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Jobs\ImportJob;
use App\Imports\UserImport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view ('admin.user.index', compact('user'));
        // echo "a";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     $jobs        = DB::table('jobs')::get();
    //     $religions   = DB::table('religions')::get();
    //     $marriages   = DB::table('marriages')::get();
    //     $blood_types = DB::table('blood_types')::get();
    //     $roles       = DB::table('roles')::get();
    //     $lineages    = DB::table('lineages')::get();
    //     $educations  = DB::table('educations')::get();

    //     $arr = ['jobs', 'religions', 'marriages', 'blood_types', 'roles', 'lineages', 'educations'];
    //     return view ('admin.user.create', compact($arr));
    // }

    public function show(User $user)
    {
        //
        $user = DB::table('users')->where('nik', $user->nik)
                        ->first();
        return view ('admin.user.show', compact('user'))->render();

    }

    public function edit(User $user)
    {
        $user = DB::table('users')->where('id', $user->id)->first();
        $roles = DB::table('roles')
                    ->select('id', DB::RAW('UPPER(name) as name'))
                    ->get();
        return view ('admin.user.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        //
        if (!Hash::check($request->opassword, Auth::user()->password)) {
            return redirect()->back()
                        ->with('status', 'Password tidak sama');
        }

        $request->validate ([
            "email"     => ['required', 'email'],
            "opassword" => ['required'],
            "role"      => ['required'],
            "npassword" => ['required'],
            "vpassword" => ['required', 'min:8', 'same:npassword']
        ]);



        $user = User::find($user->id);

        $user->email    = $request->email;
        $user->password = Hash::make($request->npassword);
        $user->role_id  = $request->role;

        $user->save();

        return redirect('admin/user')
                ->with('message', 'Data Pengguna Berhasil Diperbarui')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }


 //    public function import(Request $request)
	// {
	// 	// validasi
	// 	$this->validate($request, [
	// 		'file' => 'required|mimes:csv,xls,xlsx'
	// 	]);

	// 	// menangkap file excel
	// 	$file = $request->file('file');

	// 	// membuat nama file unik
	// 	$file_name = rand().$file->getClientOriginalName();

	// 	// upload ke folder di dalam folder public
	// 	$file->move('doc',$file_name);

	// 	// import data
	// 	Excel::import(new UserImport, public_path('/doc/'.$file_name));

	// 	// notifikasi dengan session
	// 	// Session::flash('sukses','Data User Berhasil Diimport!');

	// 	// alihkan halaman kembali
	// 	return redirect('admin/user');
	// }

    public function userdatatable(){

        $table = DB::table('users')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('users.id as id', 'nik', 'users.name as name', 'email', DB::RAW('UPPER(roles.name) as role'), 'users.role_id')->orderBy('name', 'asc');

        return datatables()->of($table)->make(true);
        // dump($table);
        // echo 'a';
    }
}

