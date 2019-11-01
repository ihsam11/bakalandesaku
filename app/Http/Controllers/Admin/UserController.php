<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth,Hash;
use App\Http\Controllers\Controller;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\ImportJob;
use App\Imports\UserImport;
use App\Traits\ActivityTrait;

class UserController extends Controller
{    
    use ActivityTrait;

    public function index()
    {
        $user = User::all();

        return view ('admin.user.index', compact('user'));
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
        $this->updated(1, 'Pengguna');

        
        return redirect('admin/user')
                ->with('message', 'Data Pengguna Berhasil Diperbarui')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }



    public function userdatatable(){

        $table = DB::table('users')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('users.id as id', 'nik', 'users.name as name', 'email', DB::RAW('UPPER(roles.name) as role'), 'users.role_id')->orderBy('name', 'asc');

        return datatables()->of($table)->make(true);
    }
}

