<?php

namespace App\Http\Controllers\Admin;

use App\Agenda;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AgendaController extends Controller
{
    public function index()
    {
        //
        $agendas = Agenda::all();

        return view('admin.post.agenda.index', compact('agendas'));
    }

    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
            "title"         => [ 'required', 'unique:agendas' ],
            "date_start"    => [ 'required', 'after_or_equal:today' ],
            "date_finish"   => [ 'required', 'after_or_equal:date_start'],
            "time_start"    => [ 'required' ],
            "time_finish"   => [ 'required', 'after:time_start' ],
            "description"   => [ 'required' ],        

        ])->validate();

        Agenda::create([
            "title"         => ucwords($request->title),
            "date_start"    => date('Y-m-d',strtotime($request->date_start)),
            "date_finish"   => date('Y-m-d',strtotime($request->date_finish)),
            "time_start"    => $request->time_start,
            "time_finish"   => $request->time_finish,
            "description"   => ucfirst($request->description),
            "user_id"       => Auth::user()->nik,
            "display"       => 1
        ]);

        return redirect('admin/agenda')
                ->with('message', 'Data Agenda Berhasil Ditambahkan!')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');

    }

    public function create()
    {
        //        
        return view ('admin.post.agenda.create');
        
    }

    public function show(Agenda $agenda)
    {
        //
        $agendas = Agenda::find($agenda->id);

        return View::make('admin.post.agenda.show', compact('agenda'))->render();
        
    }

    public function edit(Agenda $agenda)
    {
        //
        $agenda = Agenda::find($agenda->id);

        return view ('admin.post.agenda.edit', compact('agenda'));
    }


    public function update(Request $request, Agenda $agenda)
    {
        //
        Validator::make($request->all(), [
            "title"         => [ 'required' ],
            "date_start"    => [ 'required', 'after_or_equal:today' ],
            "date_finish"   => [ 'required', 'after_or_equal:date_start'],
            "time_start"    => [ 'required' ],
            "time_finish"   => [ 'required', 'after:time_start' ],
            "description"   => [ 'required' ],        

        ])->validate();

        $agenda = Agenda::find($agenda->id);
        $agenda->title          = ucwords($request->title);
        $agenda->date_start     = date('Y-m-d',strtotime($request->date_start));
        $agenda->date_finish    = date('Y-m-d',strtotime($request->date_finish));
        $agenda->time_start     = $request->time_start;
        $agenda->time_finish    = $request->time_finish;
        $agenda->description    = ucfirst($request->description);

        $agenda->save();

        return redirect('admin/agenda')
                ->with('message', 'Data Agenda Berhasil Diperbarui !')
                ->with('alert', 'alert-success text-success')
                ->with('icon', 'fa-check');
    }

    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);

        return redirect('admin/agenda');
    }
}
