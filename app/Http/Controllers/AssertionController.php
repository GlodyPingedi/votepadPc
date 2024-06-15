<?php

namespace App\Http\Controllers;

use App\Models\Assertion;
use App\Http\Requests\StoreAssertionRequest;
use App\Http\Requests\UpdateAssertionRequest;
use App\Models\Question;

class AssertionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assertions = Assertion:: orderBy('question_id')->paginate(50);
       // $questionAssoc = Question::latest()->where('id', $assertions)->get();
        return view("assertions.index", compact("assertions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions= Question::orderBy("id","desc")->get();
        return view("assertions.create", compact("questions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssertionRequest $request)
    {
        $request->validated([
            'ponderation'=> 'require',
            'libele'=> 'require'
        ]);
        $assertion = Assertion::create(
            [
                'assertion'=> $request->assertion,
                'ponderation'=> $request->ponderation,
                'statut'=> $request->statut,
                'question_id'=> $request->question_id,
            ]
        );
        return redirect()->route('assertions.index')->with('success','Enregistrement reussit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assertion $assertion)
    {
        $assertionShow=$assertion;
        return view('assertions.show', compact('assertionShow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assertion $assertion)
    {
        $assertionEdit=$assertion;
        $questions= Question::orderBy('id', 'desc')->get();
        $questionAssoc = Question::latest()->where('id', $assertion->question_id)->get();
        return view('assertions.edit', compact('assertionEdit','questions','questionAssoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssertionRequest $request, Assertion $assertion)
    {
        $assertion->update([
            'assertion'=> $request->assertion,
            'ponderation'=> $request->ponderation,
            'statut'=> $request->statut,
            'question_id'=> $request->question_id
        ]);
        return redirect()->route('assertions.index')->with('success','Modification effectuée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assertion $assertion)
    {
        //desactiver à la place de supprimer
    }
}
