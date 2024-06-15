<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Models\Evenement;
use Illuminate\Support\Facades\DB;

class PhaseController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phase = Phase::latest()->get();
        return view("phases.index", compact("phase"));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenements=Evenement:: orderBy('nom')->get();
        return view("phases.create", compact("evenements"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhaseRequest $request)
    {
        $request->validated([
            'nom'=> 'require [ max:50 | min:3',
            'description'=> 'require'
        ]);
        $phase = Phase::create(
            [
                'nom'=> $request->nom,
                'description'=> $request->description,
                'statut'=> $request->statut,
                'date_debut'=> $request->date_debut,
                'date_fin'=> $request->date_fin,
                'evenement_id'=> $request->evenement_id
            ]

        );
        
        return redirect()->route('phases.index')->with('success','Enregistrement reussit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phase $phase)
    {
        $phaseShow=$phase;
        return view('phases.show', compact('phaseShow'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phase $phase, Evenement $evenement)
    {
        $phaseEdit= $phase;
        return view('phases.edit', compact('phaseEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhaseRequest $request, Phase $phase)
    {
        $phase->update([
            'nom'=> $request->nom,
            'statut'=> $request->statut,
            'description'=> $request->description,
            'date_debut'=> $request->date_debut,
            'date_fin'=> $request->date_fin
        ]);
        return redirect()->route('phases.index')->with('success','phase modifiée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phase $phase)
    {
        // $phase->delete();
        // return redirect()->route('phases.index')->with('success','Suppression effectuée avec succès');
        //Je suggere la desactivation de la phase dans le statut
    }
    public function active()
    {
        $phase = Phase::latest()->where("statut","active")->get();
        return view("phases.index", compact("phase"));
    }
    public function encours()
    {
        $phase = Phase::latest()->where("statut","encours")->get();
        return view("phases.index", compact("phase"));
    }
    public function desactive()
    {
        $phase = Phase::latest()->where("statut","desactive")->get();
        return view("phases.index", compact("phase"));
    }
    public function enAttente()
    {
        $phase = Phase::latest()->where("statut","en attente")->get();
        return view("phases.index", compact("phase"));
    }
    public function pause()
    {
        $phase = Phase::latest()->where("statut","pause")->get();
        return view("phases.index", compact("phase"));
    }
    public function terminer()
    {
        $phase = Phase::latest()->where("statut","terminer")->get();
        return view("phases.index", compact("phase"));
    }

    public function evenementPhase($id){
        $phaseShow1 = Phase::latest()->where('id', $id)->get();
        foreach($phaseShow1 as $key => $value) {
            $evenement=$value->evenement_id;
           }//recuperation de l' id de l'evenement

        $phaseShow= DB::table('evenements')
            ->join('phases',"evenements.id","=","phases.evenement_id")
            // ->select('evenements.*', 'phases.*') //on recupere tout mais avec conflit de champs identitiques
            ->select(
                'evenements.id as id_event',
                'evenements.nom as nom_event',
                'type as type_envent',
                'status as stat_event',
                'phases.id as id',
                'phases.nom as nom_phase',
                'phases.description as decrip_phase',
                'phases.statut as stat_phase',
                'phases.date_debut as debut_phase',
                'phases.date_fin as fin_phase')
            ->where("evenements.id","=", (isset($evenement))?$evenement:null)
            ->where("phases.id","=",$id)
            ->get();
       
        return view('phases.show', compact('phaseShow'));
    }
    public function editPhase($id){
        $phaseShow1 = Phase::latest()->where('id', $id)->get();
        foreach($phaseShow1 as $key => $value) {
            $evenement=$value->evenement_id;
           }//recuperation de l' id de l'evenement

        $phaseEdit= DB::table('evenements')
            ->join('phases',"evenements.id","=","phases.evenement_id")
            // ->select('evenements.*', 'phases.*') //on recupere tout mais avec conflit de champs identitiques
            ->select(
                'evenements.id as id_event',
                'evenements.nom as nom_event',
                'type as type_envent',
                'status as stat_event',
                'phases.id as id',
                'phases.nom as nom_phase',
                'phases.description as decrip_phase',
                'phases.statut as stat_phase',
                'phases.date_debut as debut_phase',
                'phases.date_fin as fin_phase')
            ->where("evenements.id","=", (isset($evenement))?$evenement:null)
            ->where("phases.id","=",$id)
            ->get();
       
        return view('phases.edit', compact('phaseEdit'));
    }
   
}
