<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervenant;
use Illuminate\Http\Request;

class IntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
            /**
     * @OA\Get(
     *      path="/intervenants",
     *      operationId="getIntervenantsList",
     *      tags={"Intervenants"},
     *      summary="Afficher la liste des intervenants",
     *      description="Api qui nous retourne la liste des intervenants",
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
        $intervenants = Intervenant::all();
        return response()->json($intervenants);
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
    public function show(Intervenant $intervenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervenant $intervenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intervenant $intervenant)
    {
        //
    }
}
