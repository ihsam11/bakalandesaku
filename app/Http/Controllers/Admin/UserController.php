<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\DB;
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
        $user = User::paginate(10);

        return view ('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobs        = DB::table('jobs')::get();
        $religions   = DB::table('religions')::get();
        $marriages   = DB::table('marriages')::get();
        $blood_types = DB::table('blood_types')::get();
        $roles       = DB::table('roles')::get();
        $lineages    = DB::table('lineages')::get();
        $educations  = DB::table('educations')::get();

        $arr = ['jobs', 'religions', 'marriages', 'blood_types', 'roles', 'lineages', 'educations'];
        return view ('admin.user.create', compact($arr));

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
        $input = $request->all();

        Validator::make ($input, [

        ]);


        User::create ([
            ""
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$file_name = rand().$file->getClientOriginalName();

		// upload ke folder di dalam folder public
		$file->move('doc',$file_name);

		// import data
		Excel::import(new UserImport, public_path('/doc/'.$file_name));

		// notifikasi dengan session
		// Session::flash('sukses','Data User Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('admin/user');
	}
}
