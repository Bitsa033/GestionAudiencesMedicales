<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Http\Requests\StoreMedecinRequest;
use App\Http\Requests\UpdateMedecinRequest;
use App\Models\Specialitie;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins=Medecin::all();

        return view('medecins.index',[
            'medecins'=>$medecins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialites=Specialitie::all();

        return view('medecins.create',[
            'domaines'=>$specialites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedecinRequest $request)
    {
        $name=$request->get('name');
        $email=$request->get('email');
        $phone=$request->get('phone');
        $specialite=$request->get('specialite');

        Medecin::create([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'is_available'=>1,
            'speciality_id'=>$specialite,
        ]);

        return redirect("all_medecins?create=ok");
    }

    /**
     * Display the specified resource.
     */
    public function show(Medecin $medecin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medecin $medecin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedecinRequest $request, Medecin $medecin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medecin $medecin)
    {
        //
    }
}
