<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsDashboardController extends Controller
{
    public function doctorindex()
    {
        return view('Doctordashboard.index');
    }

    public function doctorblogs()
    {
        return view('Doctordashboard.blogs');
    }

    public function doctorprofile()
    {
        return view('Doctordashboard.profile');
    }

    public function doctorappointment()
    {
        return view('Doctordashboard.appointment');
    }

    public function doctorpatient()
    {
        return view('Doctordashboard.patients');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->regenerate();



        return redirect()->route('showLanding');
    }
}
