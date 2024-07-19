<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/authenticate', [AuthController::class, 'authenticate'])
    ->name('authenticate');