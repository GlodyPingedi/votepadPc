<?php

use App\Http\Controllers\CritereController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('evenements',EvenementController::class);
    Route::resource('criteres',CritereController::class);
    Route::resource('intervenants',IntervenantController::class);
});