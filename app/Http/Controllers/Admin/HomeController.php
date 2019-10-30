<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class HomeController extends Controller
{	
	
    public function index()
    {
		$bulletin 	= DB::table('bulletins');
		$agenda	 	= DB::table('agendas');
		$photograph = DB::table('photographs');
		$recording	= DB::table('recordings');
		$broadcast	= DB::table('broadcasts');

    	$counts = (object) array (
    		"bulletin" 	 => $bulletin->count(),
    		"agenda"	 => $agenda->count(),
    		"photograph" => $photograph->count(),
    		"recording"	 => $recording->count()
    	);

		$activities = [1,2,3,4,5,6,7,8];
		
		$bulletins = DB::table('bulletins')->orderBy('viewer', 'desc')->limit(5)->get();

        return view ('admin.home', compact('counts', 'activities', 'bulletins'));
    }


}
