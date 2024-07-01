<?php

namespace App\Http\Controllers\Api;

use App\Models\Intervenant;
use Illuminate\Http\Request;
use App\Models\IntervenantPhase;
use App\Http\Controllers\Controller;
use App\Http\Resources\IntervenantPhaseResource;

class IntervenantPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($phaseId)
    {
        $intervenantPhases = IntervenantPhase::where('phase_id', $phaseId)->get();
        $intervenants = [];
    
        foreach ($intervenantPhases as $intervenantPhase) {
            $intervenant = Intervenant::find($intervenantPhase->intervenant_id);
            $intervenant->intervenantPhaseId = $intervenantPhase->id;
            $intervenants[] = $intervenant;
        }
    
        return IntervenantPhaseResource::collection($intervenants);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IntervenantPhase $intervenantPhase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntervenantPhase $intervenantPhase)
    {
        //
    }
}
