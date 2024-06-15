<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Http\Requests\StoreReponseRequest;
use App\Http\Requests\UpdateReponseRequest;
use App\Models\Assertion;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $question= Question::orderBy("id","desc")->paginate(1);
        // $assertion=Assertion::orderBy("id","desc")->where("question_id",)->get();

        $questionAssertion = DB::table('assertions')
            ->join('questions', 'assertions.question_id', '=', 'questions.id')
            ->select(
                'questions.id as question_id',
                'questions.ponderation as question_ponderation',
                'questions.question as question',
                'questions.statut as quest_stat',
                'assertions.*')
            ->where('questions.statut','=','valide')
            ->where('assertions.statut','=','active')
            ->get();
    
        return view("reponses.index", compact('questionAssertion'));
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
    public function store(StoreReponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reponse $reponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reponse $reponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReponseRequest $request, Reponse $reponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reponse $reponse)
    {
        //
    }
}
