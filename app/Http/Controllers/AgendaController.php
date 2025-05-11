<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Models\Medecin;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas=Agenda::all();

        return view("agendas.index",[
            "agendas"=>$agendas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medecins=Medecin::all();

        return view("agendas.create",[
            'medecins'=>$medecins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgendaRequest $request)
    {
        $medecin=$request->get('medecin');
        $day_of_week=$request->get('day_of_week');
        $start_time=$request->get('start_time');
        $end_time=$request->get('end_time');
        Agenda::create([
            'medecin_id'=>$medecin,
            'day_of_week'=>$day_of_week,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
        ]);

        Return redirect("all_agendas?create=ok");
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
