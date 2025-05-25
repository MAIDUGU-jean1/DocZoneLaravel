<?php

use App\Http\Controllers\DoctorsDashboardController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User routes
Route::get('/index', [LandingPageController::class, 'Index'])->name('showLanding');

Route::middleware(['auth', 'patient'])->group(function () {
    Route::get('/user/index', [PatientController::class, 'UserIndex'])->name('ShowUserLanding');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('web');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('web');



// Doctor routes
Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('/doctor/index', [DoctorsDashboardController::class, 'doctorindex'])->name('doctorindex');
    Route::get('/doctor/profile', [DoctorsDashboardController::class, 'doctorprofile'])->name('doctorprofile');
    Route::get('/doctor/appointment', [DoctorsDashboardController::class, 'doctorappointment'])->name('doctorappointment');
    Route::get('/doctor/patient', [DoctorsDashboardController::class, 'doctorpatient'])->name('doctorpatient');
    Route::post('/doctor/logout', [DoctorsDashboardController::class, 'logout'])->name('doctorlogout');
});
