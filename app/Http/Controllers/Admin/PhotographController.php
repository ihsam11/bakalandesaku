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
        $photographs = Photograph::paginate(10);

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
            "topic"       => [ 'required' ],
            "title"       => [ 'required' ],
            "image"       => [ 'required', 'image', 'mimes:jpg,png,bmp,jpeg', 'max:20000' ],
            "description" => [ 'required' ]
        ]);

        $file = $request->file('image');
        $imageName = rand().".".$file->getClientOriginalExtension();

        request()->image->move(public_path('img/photograph'), $imageName);
        Photograph::create ([
            "topic_id"      =>  $request->topic,
            "title"         =>  $request->title,
            "path"          => "/img/photograph/".$imageName,
            "description"   =>  $request->description,
            "display"       =>  1
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
    public function show(Photograph $photo)
    {
        //
        $topic = Topic::find($photo->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photograph  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photograph $photograph)
    {
        //
        $topics = Topic::all();
        $photograph = Photograph::find($photograph->id);
        return view ('admin.gallery.photograph.edit', compact('photograph', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photograph  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photograph $photograph)
    {
        //
        $input = $request->all();

        $validator = Validator::make( $input, [
            "topic"       => [ 'required' ],
            "title"       => [ 'required' ],
            "image"       => [ 'required', 'image', 'mimes:jpg,png,bmp,jpeg', 'max:20000' ],
            "description" => [ 'required' ]
        ]);

        $file = $request->file('image');
        $imageName = rand().".".$file->getClientOriginalExtension();

        request()->image->move(public_path('img/photograph'), $imageName);

        $photograph = Photograph::find($photograph->id);

        $photograph->title       = $request->title;
        $photograph->path        = "/img/photograph/".$imageName;
        $photograph->description = $request->description;
        $photograph->display     = 1;
        $photograph->save();

        return redirect ('admin/photograph')
                ->with('message', 'Foto berhasil diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photograph  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photograph $photograph)
    {
        //
        Photograph::destroy($photograph->id);

        return redirect ('admin/photograph')
                ->with('message', 'Foto berhasil dihapus !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-success');

    }
}
