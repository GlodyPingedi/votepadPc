<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Assertion;
use App\Models\Phase;
use App\Models\QuestionPhase;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(25);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $phase= Phase::orderBy('id', 'desc')->get();
        return view('questions.create', compact('phase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $verifQuestion=Question::orderBy('id','desc')->where("question",$request->question)->count();
        if($verifQuestion> 0){
            return back()->with("echec","Cette question existe déjà");
        }else{
        $question = Question::firstOrCreate([
            'question'=> $request->question
        ]);

        $dernier= Question::orderBy('id','desc')->take(1)->get();
        foreach ($dernier as $key => $value) {
          $question_id= $value->id;
        }
       $enregistrment=['question_id' => $question_id, 'phase_id'=> $request->phase_id, 'ponderation'=> $request->ponderation];
        // return redirect()->action(
        //     // [QuestionPhaseController::class, 'store'], $enregistrment
        //     to_route('questionPhases.store',$enregistrment)
        // );

        $assertion = Assertion::firstOrCreate([
            'question_id'=>$enregistrment['question_id'],
            'assertion'=> $request->assertion,
            'ponderation'=> $request->ponderationAssert,
            'statut'=>"ok"
        ]);

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
                    "phase_id"=> $enregistrment['phase_id'],
                    "question_id"=> $enregistrment['question_id'],
                    "ponderation"=> $enregistrment['ponderation']
                ]);
                $questionPhase->save();
                return back()->with("success","Question enregistrée avec succes"); 
        }
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $phaseAssoc = Phase::latest()->where('id', $question->phase_id)->get();
        $questionShow=$question;
        return view('questions.show', compact('questionShow','phaseAssoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {

        $phases=Phase::orderBy('id','desc')->get();
        $questionEdit=$question;
        $phaseAssoc = Phase::latest()->where('id', $question->phase_id)->get();
       return view('questions.edit', compact('questionEdit','phases','phaseAssoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update([
            'question'=> $request->question,
            'ponderation'=>$request->ponderation,
            'statut'=>$request->statut
        ]);
        return redirect()->route('questions.index')->with('success','Question modifiée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //desactivation de statut et on va creer une vue pour les questions supprimees
    }
}
