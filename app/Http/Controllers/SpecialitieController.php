<?php

namespace App\Http\Controllers;

use App\Models\Specialitie;
use App\Http\Requests\StoreSpecialitieRequest;
use App\Http\Requests\UpdateSpecialitieRequest;

class SpecialitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites=Specialitie::all();

        return view('domaines.index',[
            'domaines'=>$specialites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("domaines.create",[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialitieRequest $request)
    {
        $name=$request->get('name');

        Specialitie::create([
            'name'=>$name,
        ]);

        return redirect("all_specialites?create=ok");
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialitie $specialitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialitie $specialitie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialitieRequest $request, Specialitie $specialitie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialitie $specialitie)
    {
        //
    }
}
