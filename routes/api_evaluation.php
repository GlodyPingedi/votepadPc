<?php

use App\Http\Controllers\Api\PhaseController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Support\Facades\Route;

// Route::get('/phases', [PhaseController::class ,'index']);
 Route::apiResource('/phases', PhaseController::class, ['as'=> 'api'])->middleware('auth:sanctum');
 Route::apiResource('/questions', QuestionController::class, ['as'=> 'api'])->middleware('auth:sanctum');