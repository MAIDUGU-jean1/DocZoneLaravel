<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [LandingPageController::class, 'Index'])->name('showLanding');
Route::get('/user/index', [PatientController::class, 'UserIndex'])->name('ShowUserLanding');
//Route to render the registeratin of users
Route::post('/register', [AuthController::class, 'register'])->name('register');
