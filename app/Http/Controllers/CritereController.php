<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Critere;
use App\Http\Requests\StoreCritereRequest;
use App\Http\Requests\UpdateCritereRequest;
use App\Models\PhaseCritere;

class CritereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phases = Phase::latest()->get();
        $criteres = Critere::with('phases')->latest()->paginate(13);
        return view('criteres.index', compact('criteres', 'phases'));
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
    public function store(StoreCritereRequest $request)
    {
        $request->validate([
            'libelle' =>'required',
            'description' =>'required',
            'ponderation' =>'required',
            'echelle' =>'required',
            ]
        );
        $selectedPhaseId = $request->get('phase');
        $critere = Critere::create(
            [
                'libelle' => $request->libelle,
                'description' => $request->description,
                'ponderation' => $request->ponderation,
            ]
        );
        
        $critere_phase = PhaseCritere::create(
            [
                'phase_id' => $selectedPhaseId,
                'critere_id' => $critere->id,
                'echelle' => $request->echelle,
            ]
        );

        return redirect(route('criteres.index'))->with('success', 'Enregistrement reussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Critere $critere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Critere $critere)
    {
        return view('criteres.edit', compact('critere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCritereRequest $request, Critere $critere)
    {
        $request->validate([
            'libelle' =>'required',
            'description' =>'required',
            'ponderation' =>'required',
            ]
        );

        $critere = Critere::findOrFail($critere->id);
        $critere ->update(
            [
                'libelle' => $request->libelle,
                'description' => $request->description,
                'ponderation' => $request->ponderation,

            ]
        );

        return redirect(route('criteres.index'))->with('success', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Critere $critere)
    {
        $critere->delete();
        return redirect()->route('criteres.index')->with('success', 'Critère supprimé avec succès');
    }
}
