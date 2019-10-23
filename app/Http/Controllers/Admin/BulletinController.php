<?php

namespace App\Http\Controllers\Admin;

use App\Bulletin;
use App\Topic;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BulletinController extends Controller
{
    public function index()
    {

        $bulletins = DB::table('bulletins')
                        ->join('topics', 'topics.id', '=', 'bulletins.topic_id')
                        ->select('bulletins.id','topics.name as topic', 'bulletins.title', 'bulletins.created_at', 'bulletins.viewer')
                        ->get();

        return view ('admin.post.bulletin.index', compact('bulletins'));
    }


    public function show(Bulletin $bulletin)
    {
                //
        $bulletin = DB::table('bulletins')
                        ->where('bulletins.id', $bulletin->id)
                        ->join('topics', 'topics.id', '=', 'bulletins.topic_id')
                        ->join('users', 'users.nik', '=', 'bulletins.user_id')
                        ->select('bulletins.*', 'topics.name as topic', 'users.name as uploader')
                        ->first();

        $view = View::make('admin.post.bulletin.show', compact('bulletin'))->render();

        return $view;
    }

    public function create() {

        $bulletins = DB::table('bulletins')
                        ->join('topics', 'topics.id', '=', 'bulletins.topic_id')
                        ->join('users', 'users.nik', '=', 'bulletins.user_id')
                        ->select('bulletins.*', 'topics.name as topic', 'users.name as uploader')
                        ->get();

        $topics    = DB::table('topics')->get();

        if ( is_null( $topics->first() ) ) {
            return redirect()->back()
                    ->with('message', 'Tidak dapat mengakses menu. Silahkan lakukan penambahan topik berita melalui menu Daftar Topik')
                    ->with('alert', 'alert-danger text-danger')
                    ->with('icon', 'fas fa-times');
        }

        return view ('admin.post.bulletin.create', compact('bulletins', 'topics'));
    }

    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
            "topic_id"   => [ 'required' ],
            "image"      => [ 'required', 'mimes:jpeg,png,jpg,gif,svg','max:4096' ],
            "title"      => [ 'required', 'unique:bulletins'],
            "content"    => [ 'required' ]
        ])->validate();

        $file = $request->file('image');
        $imageName = rand()."".$file->getClientOriginalExtension();

        request()->image->move(public_path('img/post'), $imageName);

        Bulletin::create ([
            "topic_id"   => $request->topic_id,
            "image_path" => '/img/post/'.$imageName,
            "title"      => $request->title,
            "content"    => $request->content,
            "user_id"    => Auth::user()->nik,
            "display"    => $request->display,
        ]);

        $topic = Topic::find($request->topic_id);
        $topic->post_count = (int) $topic->post_count + 1;
        $topic->save();

        return redirect('admin/bulletin')
                   ->with('message', 'Data Berita Berhasil Ditambahkan !')
                   ->with('alert', 'alert-success text-success')
                   ->with('icon', 'fa-check');

    }

    public function edit(Bulletin $bulletin)
    {
        //
        $topics     = Topic::all();
        $bulletins  = Bulletin::all();
        $bulletin   = Bulletin::find($bulletin->id);

        return view ('admin.post.bulletin.edit', compact('bulletin', 'topics', 'bulletins'));
    }

    public function update(Request $request, Bulletin $bulletin)
    {
        //
         Validator::make($request->all(), [
            "topic_id"   => [ 'required' ],
            "image"      => [ 'required', 'mimes:jpeg,png,jpg,gif,svg','max:4096' ],
            "title"      => [ 'required' ],
            "content"    => [ 'required' ]
        ])->validate();

        $file = $request->file('image');
        $imageName = rand().$file->getClientOriginalExtension();

        request()->image->move(public_path('img/post'), $imageName);

        $bulletin = Bulletin::find($bulletin->id);

        $bulletin->topic_id   = $request->topic_id;
        $bulletin->image_path = '/img/post/'.$imageName;
        $bulletin->title      = $request->title;
        $bulletin->content    = $request->content;
        $bulletin->display    = $request->display;

        $bulletin->save();

        return redirect('admin/bulletin')
                ->with('message', 'Data Berita Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    public function destroy(Bulletin $bulletin)
    {
        //
        Bulletin::destroy($bulletin->id);
        $topic = Topic::find($bulletin->topic_id);
        $topic->post_count = (int) $topic->post_count - 1;
        $topic->save();

        return redirect('admin/bulletin')
                ->with('message', 'Data Berita Berhasil Dihapus !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

}
