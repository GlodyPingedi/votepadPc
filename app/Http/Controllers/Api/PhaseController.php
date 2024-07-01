<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhaseResource;
use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
            /**
     * @OA\Get(
     *      path="/phases",
     *      operationId="getPhasesList",
     *      tags={"phases"},
     *      summary="Afficher la liste des Phases",
     *      description="Api qui nous retourne la liste des Phases",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     *     )
     */
    public function index(){
        return PhaseResource::collection(Phase::all());
    }

    
    public function show(Phase $phase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phase $phase)
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
}
