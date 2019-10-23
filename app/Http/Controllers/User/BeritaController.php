<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;


class BeritaController extends Controller
{
    public function kegiatan(){

        $berita = DB::table('bulletins')->where('topic_id', 2)->get();

        if ($berita->isNotEmpty()) {
            $kegiatan = $berita;
        }else{
            $kegiatan = "Data belum tersedia";
        }

        // dd($updated_at);
        return view('bulletins.kegiatan', compact('kegiatan'));
    }

    public function agenda(){

        return view('bulletins.agenda');
    }
    public function agendatable(){

        $agenda = DB::table('agendas')->get();

        return datatables()->of($agenda)->make(true);
    }

    public function pembangunan(){

        $berita = DB::table('bulletins')->where('topic_id', 1)->get();

        if ($berita->isNotEmpty()) {
            $pembangunan = $berita;
        }else{
            $pembangunan = "Data belum tersedia";
        }

        return view('bulletins.pembangunan', compact('pembangunan'));
    }
    
    public function pengumuman(){

        $berita = DB::table('bulletins')->where('topic_id', 1)->get();

        if ($berita->isNotEmpty()) {
            $pengumuman = $berita;
        }else{
            $pengumuman = "Data belum tersedia";
        }

        return view('bulletins.pengumuman', compact('pengumuman'));
    }
}
