<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use DataTables, Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index()
    {
        //        
        $topics = Topic::all();
        return view ('admin.post.topic.index', compact('topics'));
    }    

    public function create() {        
        $topics = Topic::all();        
        return view ('admin.post.topic.create', compact('topics'));
    }

    public function store(Request $request)
    {           
        Validator::make($request->all(), [
            'name'        => [ 'required', 'unique:topics' ],
            'description' => [ 'required' ]
        ])->validate();
                
        Topic::create ([
            "name"        => ucwords($request->name),
            "description" => ucfirst($request->description)
        ]);                                       
        
        return redirect('/admin/topic')
                ->with('message', 'Data Topik Berhasil Ditambahkan !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    public function edit($id)
    {
        //                        
        $topic = Topic::find($id);
        $topics = Topic::all();      

        return view ('admin.post.topic.edit', compact('topic', 'topics'));
    }

    public function update(Request $request, Topic $topic)
    {           
        //
        Validator::make($request->all(), [
            'name'          => [ 'required' ],
            'description'   => [ 'required' ]
        ])->validate();

        $topic = Topic::find($topic->id);

        $topic->name        = ucwords($request->name);
        $topic->description = ucfirst($request->description);

        $topic->save();

        return redirect ('/admin/topic')
                ->with('message', 'Data Topik Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
        
    }    

    public function destroy($id)
    {
        //
        Topic::destroy($id);

        return redirect ('/admin/topic');
    }

}
