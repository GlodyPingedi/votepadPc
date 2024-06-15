<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Phase;
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
        $question = Question::create([
            'question'=> $request->question,
            'ponderation'=> $request->ponderation,
            'statut'=> $request->statut,
            'phase_id'=> $request->phase_id,
        ]);
        return redirect()->route('questions.index')->with('success','question enregistrée avec succes');
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
