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
use App\Traits\ActivityTrait;

class BulletinController extends Controller
{

    use ActivityTrait;

    public function index()
    {

        $bulletins = DB::table('bulletins')
                        ->join('topics', 'topics.id', '=', 'bulletins.topic_id')
                        ->select('bulletins.id','topics.name as topic', 'bulletins.title', DB::RAW('DATE_FORMAT(bulletins.created_at, \'%e %M %Y\') as created_at'), 'bulletins.viewer')
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
                        ->select('bulletins.*', 'topics.name as topic', 'users.name as uploader', DB::RAW('DATE_FORMAT(bulletins.created_at, \'%e %M %Y\') as post_date'))
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
            "image"      => [ 'required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg' ],
            "title"      => [ 'required', 'unique:bulletins'],
            "content"    => [ 'required' ]
        ])->validate();

        $file = $request->file('image');
        $imageName = rand().".".$file->getClientOriginalExtension();

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
        $this->added(2, 'Berita');


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
            "image"      => [ 'mimes:jpeg,png,jpg,gif,svg','max:2048' ],
            "title"      => [ 'required' ],
            "content"    => [ 'required' ]
        ])->validate();
        
        $bulletin = Bulletin::find($bulletin->id);

        if ($request->file('image')) {
            $file = $request->file('image');
            $imageName = rand().$file->getClientOriginalExtension();
            request()->image->move(public_path('img/post'), $imageName);
            $bulletin->image_path = '/img/post/'.$imageName;
        }

        $bulletin->topic_id   = $request->topic_id;
        $bulletin->title      = $request->title;
        $bulletin->content    = $request->content;
        $bulletin->display    = $request->display;

        $bulletin->save();
        $this->updated(2, 'Berita');


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

        $this->deleted(2, 'Berita');


        return redirect('admin/bulletin');
    }

}
