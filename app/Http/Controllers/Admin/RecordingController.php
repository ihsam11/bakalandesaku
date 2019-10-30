<?php

namespace App\Http\Controllers\Admin;

use App\Recording;
use App\Topic;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class RecordingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recordings = DB::table('recordings')
                        ->select('id', 'url', 'description', DB::RAW('DATE_FORMAT(created_at, "%e %M %Y") as created_at'), 'display')
                        ->get();

        return view ('admin.gallery.recording.index', compact('recordings'));
    }

    public function create() {
        return View::make('admin.gallery.recording.create');
    }

    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            "description"   => [ 'required' ],
            "url"           => [ 'required' ]
        ])->validate();


        Recording::create ([
            "description"   => $request->description,
            "url"           => $request->url,
            "display"       => 1
        ]);

        return redirect()->back()
                ->with('message', 'Video Berhasil Ditambahkan !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function show(Recording $recording)
    {
        //
        $recording = DB::table('recordings')
                        ->where('recordings.id', $recording->id)                        
                        ->select('recordings.description', 'recordings.url', 'recordings.id')
                        ->first();

        return View::make('admin.gallery.recording.show', compact('recording'))
                ->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function edit(Recording $recording)
    {
        //
        $recording = Recording::find($recording->id);
        return View::make('admin.gallery.recording.edit', compact('recording'));
    }

    public function update(Request $request, Recording $recording)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            "description"   => [ 'required' ],
            "url"           => [ 'required' ]
        ])->validate();

        $recording = Recording::find($recording->id);

        $recording->description   = $request->description;
        $recording->url           = $request->url;

        $recording->save();

        return redirect('admin/recording')
                ->with('message', 'Video Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recording $recording)
    {
        //
        Recording::destroy($recording->id);

        return redirect('admin/recording');
    }
}
