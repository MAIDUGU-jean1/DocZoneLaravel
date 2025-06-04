<?php
use App\Http\Livewire\Index;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DoctorsDashboardController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\LandingPageController;
use App\Models\Message;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $messages = Message::orderBy('created_at')->get();
    return view('welcome', compact('messages'));
});

// User routes
// web.php
Route::patch('/appointments/{id}/confirm', [LandingPageController::class, 'confirmAppointment'])
    ->name('appointments.confirm');
Route::post('/confirmBook', [LandingPageController::class, 'confirmBook'])->name('confirmBook');
Route::get('/bookDoctor/{id}', [LandingPageController::class, 'showBooking'])->name('book');
//Route::get('/', [LandingPageController::class, 'showBookingForm'])->name('showBookingForm');
Route::post('/blogs', [LandingPageController::class, 'blogs'])->name('blogs');
Route::post('/testimony', [LandingPageController::class, 'testimony'])->name('testimony');
Route::get('/index', [LandingPageController::class, 'Index'])->name('showLanding');
Route::get('/user/index', [PatientController::class, 'UserIndex'])->name('ShowUserLanding');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('web');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('web');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Doctor routes
Route::get('/dashboard/blogs', [DoctorsDashboardController::class, 'doctorblogs'])->name('doctorblogs');
Route::get('/dashboard/index', [DoctorsDashboardController::class, 'doctorindex'])->name('doctorindex');
Route::get('/dashboard/profile', [DoctorsDashboardController::class, 'doctorprofile'])->name('doctorprofile');
Route::get('/dashboard/appointment', [DoctorsDashboardController::class, 'doctorappointment'])->name('doctorappointment');
Route::get('/dashboard/patient', [DoctorsDashboardController::class, 'doctorpatient'])->name('doctorpatient');
Route::post('/dashboard/logout', [DoctorsDashboardController::class, 'logout'])->name('doctorlogout');


//open ai routes

//Route::get('/chat', [ChatController::class, 'index']);
//Route::post('/chat', [ChatController::class, 'chat']);
Route::view('/chat', 'welcome'); 


