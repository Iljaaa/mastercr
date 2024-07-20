<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/authenticate', [AuthController::class, 'authenticate'])
    ->name('authenticate');

Route::resource('candidates', CandidateController::class)
    ->names([
        'index' => 'candidates.index',
        'create' => 'candidates.create',
        'store' => 'candidates.store',
        'show' => 'candidates.show',
        'edit' => 'candidates.edit',
        'update' => 'candidates.update',
        'destroy' => 'candidates.destroy'
    ])
    ->middleware('auth');