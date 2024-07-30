<?php

use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\LastResultController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [QuestionnaireController::class, 'index'])->name('questionnaire.index')->middleware('auth');
Route::post('/responses', [ResponseController::class, 'store'])->name('responses.store')->middleware('auth');
Route::get('/results', [LastResultController::class, 'show'])->middleware('auth')->name('results.last');
Route::get('/dashboard', [WelcomeController::class, 'index'])->name('dashboard')->middleware('auth');

require __DIR__.'/auth.php';
