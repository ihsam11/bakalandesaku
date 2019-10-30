<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class HomeController extends Controller
{
    //
    public function index()
    {
    	$counts = (object) array (
    		"bulletin" 	 => DB::table('bulletins')->count(),
    		"agenda"	 => DB::table('agendas')->count(),
    		"photograph" => DB::table('photographs')->count(),
    		"recording"	 => DB::table('recordings')->count()
    	);

        return view ('admin.home', compact('counts'));
    }


}
