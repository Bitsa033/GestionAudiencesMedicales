<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Http\Requests\StoreAudienceRequest;
use App\Http\Requests\UpdateAudienceRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAudienceRequest $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            // 'medecin_id' => 'required|exists:medecins,id',
            'speciality_id' => 'required|exists:specialties,id',
            'scheduled_at' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $appointment = $this->audienceService->createAudience(
            $request->client_id,
            $request->specialty_id,
            $request->scheduled_at,
            $request->reason
        );

        if (!$appointment) {
            return response()->json(['message' => 'Aucun médecin disponible à ce moment.'], 422);
        }

        return response()->json(['message' => 'Rendez-vous créé avec succès.', 'appointment' => $appointment]);
    
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
