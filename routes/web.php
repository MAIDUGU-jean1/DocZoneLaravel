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
Route::get('/user/index', [PatientController::class, 'UserIndex'])->name('ShowUserLanding');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('web');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('web');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Doctor routes
Route::get('/dashboard/index', [DoctorsDashboardController::class, 'doctorindex'])->name('doctorindex');
Route::get('/dashboard/profile', [DoctorsDashboardController::class, 'doctorprofile'])->name('doctorprofile');
Route::get('/dashboard/appointment', [DoctorsDashboardController::class, 'doctorappointment'])->name('doctorappointment');
Route::get('/dashboard/patient', [DoctorsDashboardController::class, 'doctorpatient'])->name('doctorpatient');
Route::post('/dashboard/logout', [DoctorsDashboardController::class, 'logout'])->name('doctorlogout');
