<?php

namespace App\Http\Controllers;

use App\Models\QuestionPhase;
use App\Http\Requests\StoreQuestionPhaseRequest;
use App\Http\Requests\UpdateQuestionPhaseRequest;
use Illuminate\Support\Facades\DB;
class QuestionPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreQuestionPhaseRequest $request)
    {
        DB::connection()->enableQueryLog();
        $verif=QuestionPhase::all()->where("phase_id", $request->phase_id);//on recupere tout 
        foreach ($verif as $key => $value) {
           $verif2= $value->question_id;
           if ($verif2 == $request->question_id) 
           {  
               return back()->with("echec","Cet enregistrement existe déjà"); 
           }else{
            
           $questionPhase = QuestionPhase::firstOrCreate([
                "phase_id"=> $request->phase_id,
                "question_id"=> $request->question_id,
                "ponderation"=> $request->ponderation
            ]);
            $questionPhase->save();
            return back()->with("success","Question enregistrée avec succes"); 
            }
        } 
        $questionPhase = QuestionPhase::firstOrCreate([
            "phase_id"=> $request->phase_id,
            "question_id"=> $request->question_id,
            "ponderation"=> $request->ponderation
        ]);
        $questionPhase->save();
        return back()->with("success","Question enregistrée avec succes");     
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionPhase $questionPhase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionPhase $questionPhase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionPhaseRequest $request, QuestionPhase $questionPhase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionPhase $questionPhase)
    {
        //
    }
}
