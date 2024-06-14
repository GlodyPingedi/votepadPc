<?php

namespace App\Http\Controllers;

use App\Models\IntervenantPhase;
use App\Http\Requests\StoreIntervenantPhaseRequest;
use App\Http\Requests\UpdateIntervenantPhaseRequest;

class IntervenantPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intervenantPhase = IntervenantPhase::all();
        return view('intervenant.index', compact('intervenantPhase'));
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
    public function store(StoreIntervenantPhaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IntervenantPhase $intervenantPhase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IntervenantPhase $intervenantPhase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntervenantPhaseRequest $request, IntervenantPhase $intervenantPhase)
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
