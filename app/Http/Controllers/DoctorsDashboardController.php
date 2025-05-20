<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorsDashboardController extends Controller
{
    public function doctorindex(){
        return view('Doctordashboard.index');
    }

    public function doctorprofile(){
        return view('Doctordashboard.profile');
    }

    public function doctorappointment(){
        return view('Doctordashboard.appointment');
    }

    public function doctorpatient(){
        return view('Doctordashboard.patients');
    }
}
