<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index()
    {
        //
        $topics = Topic::all();
        return view('admin.post.topic.index', compact('topics'));
    }    

    public function store(Request $request)
    {           
        //
        $request->validate([
            'name'        => [ 'required', 'unique:topics' ],
            'description' => [ 'required' ]
        ]);

        $userId = $request->id;
        $data = Topic::updateOrCreate([ "id" => $userId ], [
            "name"        => ucwords($request->name),
            "description" => ucfirst($request->description)
        ]);        

        if ( $data ) {
            $arr = array ( 'message' => 'Data Topik Berhasil Ditambahkan !' );
        }

        return Response()->json($arr);
    }

    public function edit($id)
    {
        //                
        $where = array ("id" => $id);
        $topic = Topic::where($where)->first();

        return Response()->json($topic);
    }
    

    public function destroy($id)
    {
        //
        $topic = Topic::where('id', $id)->delete();

        return Response()->json($topic);
    }

    public function datatables() {
        $topics = Topic::all();
        return Response()->json($topics);
    }
}
