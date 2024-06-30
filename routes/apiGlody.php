<?php

use App\Http\Controllers\Api\CritereController;
use App\Http\Middleware\IntervenantTokenIsValid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EvenementController;
use App\Http\Controllers\Api\IntervenantController;
use App\Http\Controllers\SwaggerController;

Route::post('/login', [SwaggerController::class ,'login']);
Route::post('/register', [SwaggerController::class ,'register']);
Route::apiResource('evenements', EvenementController::class, ['as'=>'api'])->middleware('auth:sanctum');
Route::apiResource('criteres', CritereController::class, ['as'=>'api'])->middleware('auth:sanctum');
Route::apiResource('intervenants', IntervenantController::class, ['as'=>'api'])->middleware('auth:sanctum');

Route::post('/intervenants-authenticate', [IntervenantController::class, 'authenticate'])->name('authenticate');