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
        $recordings = Recording::all();

        return view ('admin.gallery.recording.index', compact('recordings'));
    }

    public function create() {

        $topics = Topic::all();
        return View::make('admin.gallery.recording.create', compact('topics'));
    }

    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            "description"   => [ 'required' ],
            "url"           => [ 'required','max:7' ]
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
                        ->join('topics', 'topics.id', '=', 'recordings.topic_id')
                        ->select('topics.name as topic', 'recordings.description', 'recordings.url')
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recording $recording)
    {
        //
        if (is_null($request->display)) {
            $request->display = 0;
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            "description"   => [ 'required' ],
            "url"           => [ 'required' ]
        ])->validate();

        $recording = Recording::find($recording->id);

        $recording->description   = $request->description;
        $recording->url           = $request->url;
        $recording->display       = $request->display;

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

        return redirect('admin/recording')
                ->with('message', 'Video Berhasil Dihapus !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }
}
