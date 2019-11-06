<?php

namespace App\Http\Controllers\Admin;

use App\Broadcast;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Traits\ActivityTrait;


class BroadcastController extends Controller
{
    use ActivityTrait;

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
        ])->validate();

        Broadcast::create([
            "title"           => $request->title,
            "description"     => $request->description,
            "user_id"         => Auth::user()->nik
        ]);

        $this->added(2, 'Pengumuman');

        return redirect ('admin/broadcast')
                ->with('message', 'Data Pengumuman Berhasil Ditambahkan !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');

    }

    public function show(Broadcast $broadcast)
    {
        //
        $broadcast = Broadcast::find($broadcast->id);

        return View::make('admin.post.broadcast.show', compact('broadcast'))->render();
    }

    public function edit(Broadcast $broadcast)
    {
        //
        $broadcast = Broadcast::find($broadcast->id);

        return view ('admin.post.broadcast.edit', compact('broadcast'));
    }

    public function update(Request $request, Broadcast $broadcast)
    {
        //
        Validator::make ($request->all(), [
            "title"          => [ 'required' ],
            "description"    => [ 'required' ],
        ])->validate();

        $date_range = explode("-", $request->active_range);

        $broadcast = Broadcast::find($broadcast->id);

        $broadcast->title       = $request->title;
        $broadcast->description = $request->description;
        $broadcast->user_id     = Auth::user()->nik;

        $broadcast->save();
        $this->updated(2, 'Pengumuman');


        return redirect ('admin/broadcast')
                ->with('message', 'Data Pengumuman Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    public function destroy(Broadcast $broadcast)
    {
        //
        Broadcast::destroy($broadcast->id);
        $this->deleted(2, 'Pengumuman');


        return redirect ('admin/broadcast');

    }
}
