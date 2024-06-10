<?php

use App\Http\Controllers\Api\EvenementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('evenements', EvenementController::class, ['as'=>'api']);
