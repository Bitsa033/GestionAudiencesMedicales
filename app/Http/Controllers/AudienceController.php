<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Http\Requests\StoreAudienceRequest;
use App\Http\Requests\UpdateAudienceRequest;
use App\Models\Client;
use App\Models\Specialitie;
use App\Services\AudienceService;

class AudienceController extends Controller
{

    protected $audienceService;

    public function __construct(AudienceService $audienceService)
    {
        $this->audienceService = $audienceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audiences=Audience::all();

        return view("audiences.index",[
            "audiences"=>$audiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients=Client::all();
        $specialities=Specialitie::all();

        return view("audiences.create",[
            'patients'=>$patients,
            'specialities'=>$specialities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAudienceRequest $request)
    {
        $request->validate([
            'patient' => 'required|exists:clients,id',
            // 'medecin_id' => 'required|exists:medecins,id',
            'specialitie' => 'required|exists:specialities,id',
            'scheduled_date_at' => 'required|date',
            'scheduled_time_at' => 'required|string',
            'reason' => 'nullable|string',
        ]);

        $appointment = $this->audienceService->createAudience(
            $request->patient,
            $request->specialitie,
            $request->scheduled_date_at,
            $request->scheduled_time_at,
            $request->reason
        );

        if (!$appointment) {
            return response()->json(['message' => 'Aucun médecin disponible à ce moment.'], 422);
            // return redirect("all_audiences?error=AucunMedecinDisponibleACeMoment");
        }

        // return response()->json(['message' => 'Rendez-vous créé avec succès.', 'appointment' => $appointment]);
        return redirect("all_audiences?create=ok");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Audience $audience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audience $audience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAudienceRequest $request, Audience $audience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audience $audience)
    {
        //
    }
}
