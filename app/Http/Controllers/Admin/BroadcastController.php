<?php

namespace App\Http\Controllers\Admin;

use App\Broadcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $broadcasts = Broadcast::all();
        return view ('admin.post.broadcast.index', compact('broadcasts'));
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
        $request->validate([
            "title"          => [ 'required' ],
            "description"    => [ 'required' ],
            "active_range"   => [ 'required' ]
        ]);

        Broadcast::create([
            "title"           => $request->title,
            "description"     => $request->description,
            "active_range"    => $request->active_range,
        ]);

        return view ('admin/broadcast')
                ->with('status', 'Data Pengumuman Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Broadcast $broadcast)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Broadcast $broadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broadcast $broadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadcast $broadcast)
    {
        //

    }
}
