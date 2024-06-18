<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Critere;
use Illuminate\Http\Request;

class CritereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        /**
     * @OA\Get(
     *      path="/criteres",
     *      operationId="getCriteresList",
     *      tags={"Criteres"},
     *      summary="Afficher la liste des criteres",
     *      description="Api qui nous retourne la liste des criteres",
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
    public function index()
    {
        $criteres = Critere::all();
        return response()->json($criteres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Critere $critere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Critere $critere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Critere $critere)
    {
        //
    }
}
