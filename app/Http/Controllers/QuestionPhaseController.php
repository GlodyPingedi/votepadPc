<?php

namespace App\Http\Controllers;

use App\Models\QuestionPhase;
use App\Http\Requests\StoreQuestionPhaseRequest;
use App\Http\Requests\UpdateQuestionPhaseRequest;
use App\Models\Assertion;
use App\Models\Phase;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

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
         $request->validated([
           'phase_id'=>'require',
            'question_id'=> 'require',
            'ponderation'=> 'require'
        ]);
        if(isEmpty($request->question_id)) {return back()->with("echec","Cette question n'existe pas, prière de la créer"); }else{
        DB::connection()->enableQueryLog();
        $verif=QuestionPhase::all()->where("phase_id", $request->phase_id);//on recupere tout dans question phase et on verifie si l'enregistrement existe deja
        $tabQuestion=array();
        foreach ($verif as $key => $value) {
           $verif2= $value->question_id;
          array_push($tabQuestion, $verif2);
        }
        if(in_array($request->question_id, $tabQuestion)){
            return back()->with("echec","Question existe dja dans cette phase"); 
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
    public function questionPhase(Request $request){
        
        $phase= Phase::where("id", $request->phase_id)->first();
        $question= QuestionPhase::orderBy('id')->select('question_id','ponderation')->where("phase_id", $request->phase_id)->get();//recupere toutes les questions

       $questionAssetionTab=array();
       $tableau=array();
        foreach ($question as $key => $value) {
            $assertion= Assertion::orderBy('id')->select('id','ponderation','assertion','question_id')->where("question_id", $value->question_id)->get();
            $tableau['question']=['question'=>$value->question->question,'id'=>$value->question->id,'ponderation'=>$value->ponderation];//tabeau pour question
            $tableau['assertion']=[$assertion];//tabeau pour assertion
            array_push($questionAssetionTab, $tableau);
        }
        
        foreach ($questionAssetionTab as $key => $value) {
            //value a deux tableaux [question] et [assertion] mais assertion un objet
            $tabAsseetionSimplifier=array();
           foreach ($value['assertion'] as $key2 => $assertions) {
                foreach ($assertions as $var) {
                    $varAss['assertion']= $var->assertion;
                    $varAss['id']= $var->id;
                    $varAss['ponderation']= $var->ponderation;
                    array_push($tabAsseetionSimplifier,$varAss);
                }
           }
            
        }
        
        // dd(
        //         $value['question']['question'],
        //         $value['question']['id'],
        //         $value['question']['ponderation'],
        //         $tabAsseetionSimplifier[0]['id']
        // );
        // // dd($questionAssetionTab);
        return Redirect::back()
            ->with('debut','Bonne chance')
            ->with(compact('questionAssetionTab','phase'));
    }
}
