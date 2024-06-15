<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EvenementController;
use App\Http\Controllers\SwaggerController;

Route::post('/login', [SwaggerController::class ,'login']);
Route::post('/register', [SwaggerController::class ,'register']);
Route::apiResource('evenements', EvenementController::class, ['as'=>'api'])->middleware('auth:sanctum');
