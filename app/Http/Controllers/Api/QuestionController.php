<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
            /**
     * @OA\Get(
     *      path="/questions",
     *      operationId="getQuestionsList",
     *      tags={"questions"},
     *      summary="Afficher la liste des questions",
     *      description="Api qui nous retourne la liste des questions",
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
        return  QuestionResource::collection(Question::all());
    }
}
