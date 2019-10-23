<?php

namespace App\Http\Controllers\Admin;

use App\Photograph;
use App\Topic;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PhotographController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photographs = DB::table('photographs')->paginate(15);

        return view('admin.gallery.photograph.index', compact('photographs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $topics = Topic::all();

        return view('admin.gallery.photograph.create', compact('topics'));
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
        $request->validate ([
            "title"       => [ 'required' ],
            "description" => [ 'required' ]
        ]);

        Topic::create ([
            "title"         =>  $request->title,
            "description"   =>  $request->description,
            "status"        =>  1
        ]);

        return redirect()->back()
                ->with('message', 'Foto berhasil ditambahkan !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-success');
    }

    public function store_multiple(Request $request) {

        $input = $request->all();

        $validator = Validator::make( $input, [
            "file" => [ 'required', 'image', 'mimes:jpg,png,bmp,jpeg', 'max:20000' ]
        ]);

        // if ($validator->fails()) {
        //     return response()->json('error', 400);
        // }

        $file = $request->file('file');
        $imageName = rand().".".$file->getClientOriginalExtension();

        request()->file->move(public_path('img/photograph'), $imageName);

        Photograph::create ([
            "title"         => "title",
            "path"          => "/img/photograph/".$imageName,
            "description"   => "description",
            "display"       => 1
        ]);

        return response()->json('Foto Berhasil Ditambahkan', 200);
        // dd($imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
        $topic = Topic::find($photo->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
        $topic = Topic::find($photo->id);
        return view ('admin.gallery.photograph.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
        $topic = Topic::find($request->id);

        $topic->title       = $request->title;
        $topic->description = $request->description;
        $topic->status      = $request->status;
        $topic->save();

        return redirect ('admin/photograph')
                ->with('message', 'Foto berhasil diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
        Topic::destroy($photo->id);

        return redirect ('admin/photograph')
                ->with('message', 'Foto berhasil dihapus !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-success');
    }
}
