<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhaseCritereResource;
use App\Models\IntervenantPhase;
use App\Models\PhaseCritere;
use Illuminate\Http\Request;

class PhaseCritereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PhaseCritereResource::collection($phaseCriteres = PhaseCritere::all());
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
        $phaseCriteres = PhaseCritere::where('phase_id', $phaseId)->get();
        return PhaseCritereResource::collection($phaseCriteres);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhaseCritere $phaseCritere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhaseCritere $phaseCritere)
    {
        //
    }
}
