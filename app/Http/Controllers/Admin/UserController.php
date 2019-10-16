<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		// $this->validate($request, [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);
            
        // if ($request->hasFile('file')) {
        //     //UPLOAD FILE
        //     $file = $request->file('file');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move('doc', $filename);
            
        //     // Excel::import(new UserImport, public_path('/doc/'.$filename));
        //     //MEMBUAT JOBS DENGAN MENGIRIMKAN PARAMETER FILENAME
        //     ImportJob::dispatch($filename);
        //     return redirect()->back()->with(['success' => 'Upload success']);
        // }  
        // return redirect()->back()->with(['error' => 'Please choose file before']);

        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('doc',$nama_file);

        // import data
        Excel::import(new UserImport, public_path('/doc/'.$nama_file));

        // // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/admin/user');

	}
}
