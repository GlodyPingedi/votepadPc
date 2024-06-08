<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Evenement;
use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvenementRequest $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'type' =>'required',
            'status' =>'required'
            ]
        );

        $datedebut = $request->datedebut;
        $heuredebut = $request->heuredebut;
        $dateTimeD = DateTime::createFromFormat('m/d/Y', $datedebut);
        $formatDateDebut = $dateTimeD->format('Y-m-d');
        $dateTimeDebut = ($formatDateDebut.' '.$heuredebut.':00');

        $datefin = $request->datefin;
        $heurefin = $request->heurefin;
        $dateTimeF = DateTime::createFromFormat('m/d/Y', $datefin);
        $formatDateFin = $dateTimeF->format('Y-m-d');
        $dateTimeFin = ($formatDateFin.' '.$heurefin.':00');


        $evenement = Evenement::create(
            [
                'nom' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'date_debut' => $dateTimeDebut,
                'date_fin' => $dateTimeFin,
                'status' => $request->status,
            ]
        );

        return redirect(route('evenements.index'))->with('success', 'Enregistrement reussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        return view('evenements.edit', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvenementRequest $request, Evenement $evenement)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'type' =>'required',
            'status' =>'required'
            ]
        );

        $evenement = Evenement::findOrFail($evenement->id);

        $datedebut = $request->datedebut;
        $heuredebut = $request->heuredebut;
        $dateTimeD = DateTime::createFromFormat('m/d/Y', $datedebut);
        $formatDateDebut = $dateTimeD->format('Y-m-d');
        $dateTimeDebut = ($formatDateDebut.' '.$heuredebut.':00');

        $datefin = $request->datefin;
        $heurefin = $request->heurefin;
        $dateTimeF = DateTime::createFromFormat('m/d/Y', $datefin);
        $formatDateFin = $dateTimeF->format('Y-m-d');
        $dateTimeFin = ($formatDateFin.' '.$heurefin.':00');


        $evenement->update(
            [
                'nom' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'date_debut' => $dateTimeDebut,
                'date_fin' => $dateTimeFin,
                'status' => $request->status,
            ]
        );

        return redirect(route('evenements.index'))->with('success', 'Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success', 'Evénement supprimé avec succès');
    }
}
