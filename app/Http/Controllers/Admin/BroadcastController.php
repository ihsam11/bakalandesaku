<?php

namespace App\Http\Controllers\Admin;

use App\Broadcast;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

    public function create() {

        return view ('admin.post.broadcast.create');
    }

    public function store(Request $request)
    {
        //

        Validator::make ($request->all(), [
            "title"          => [ 'required' ],
            "description"    => [ 'required' ],
            "active_range"   => [ 'required' ]
        ])->validate();

        $date_range = explode("-", $request->active_range);

        Broadcast::create([
            "title"           => $request->title,
            "description"     => $request->description,
            "date_start"      => date('Y-m-d', strtotime($date_range[0])),
            "date_finish"     => date('Y-m-d', strtotime($date_range[1])),
            "user_id"         => Auth::user()->nik
        ]);

        return redirect ('admin/broadcast')
                ->with('message', 'Data Pengumuman Berhasil Ditambahkan !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');

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
        $broadcast = Broadcast::find($broadcast->id);            
        
        return View::make('admin.post.broadcast.show', compact('broadcast'))->render();
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
        $broadcast = Broadcst::find($broadcast->id);

        return view ('admin.post.broadcast.edit', compact('broadcast'));
    }

    public function update(Request $request, Broadcast $broadcast)
    {
        //
        Validator::make ($request->all(), [
            "title"          => [ 'required' ],
            "description"    => [ 'required' ],
            "active_range"   => [ 'required' ]
        ])->validate();

        $date_range = explode("-", $request->active_range);

        $broadcast = Broadcast::find($broadcast->id);

        $broadcast->title       = $request->title;
        $broadcast->description = $request->description;
        $broadcast->date_start  = $date_range[0];
        $broadcast->date_finish = $date_range[1];
        $broadcast->user_id     = Auth::user()->nik;
        
        $broadcast->save();

        return redirect ('admin/broadcast')
                ->with('message', 'Data Pengumuman Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
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
        Broadcast::find($broadcast->id);

        return redirect ('admin/broadcast');

    }
}
