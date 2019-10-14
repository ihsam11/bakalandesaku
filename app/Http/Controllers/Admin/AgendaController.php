<?php

namespace App\Http\Controllers\Admin;

use App\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agendas = Agenda::all();
        return view('admin.post.agenda.index', compact('agendas'));
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
        $request->validate([
            "title"         => [ 'required' ],
            "date_start"    => [ 'required' ],
            "date_finish"   => [ 'required' ],
            "time_start"    => [ 'required' ],
            "time_finish"   => [ 'required' ],
            "description"   => [ 'required' ],            
        ]);

        Agenda::create([
            "title"         => ucwords($request->title),
            "date_start"    => $request->date_start,
            "date_finish"   => $request->date_finish,
            "time_start"    => $request->time_start,
            "time_finish"   => $request->time_finish,
            "description"   => ucfirst($request->description),
            "display"       => 1
        ]);

        return redirect()->back()
                ->with('status', 'Data Agenda Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
        return redirect()->back()
                ->with('status', 'Data Agenda Berhasil Diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
        return redirect()->back()
        ->with('status', 'Data Agenda Berhasil Dihapus !');
    }
}
