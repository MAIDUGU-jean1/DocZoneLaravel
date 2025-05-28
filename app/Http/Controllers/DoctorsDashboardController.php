<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsDashboardController extends Controller
{
    public function doctorindex()
    {
       $doctorId = auth()->id();
  $appointments = Appointment::where('doctor_id', $doctorId)->get();          
  $appointmentsCount = Appointment::where('doctor_id', $doctorId)->count();
  $patientCount = \App\Models\Appointment::where('doctor_id', $doctorId)
                ->where('status', 'confirmed')
                ->latest()
                ->get()
                ->unique('patient_name')
                ->count();

         // Count only unique patient_id values

        return view('Doctordashboard.index',compact('patientCount','appointmentsCount','appointments'));
    }

    public function doctorblogs()
    {   $name = Auth::user()->name;
        $doctorBlog = Blog::where('name', $name)->get();
        return view('Doctordashboard.blogs',compact('doctorBlog'));
    }

    public function doctorprofile()
    {
        return view('Doctordashboard.profile');
    }

  public function doctorappointment()
{   
    $doctorId = auth()->id(); // assuming doctor is authenticated as a user
    $appointments = Appointment::where('doctor_id', $doctorId)->get();
    
    return view('Doctordashboard.appointment', compact('appointments'));
}


    public function doctorpatient()
    {   
         $doctorId = auth()->id(); // or auth('doctor')->id() if separate guard

  $appointments = \App\Models\Appointment::where('doctor_id', $doctorId)
                ->where('status', 'confirmed')
                ->latest()
                ->get()
                ->unique('patient_name'); // ← move this after get() without semicolon

                return view('Doctordashboard.patients', compact('appointments'));
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->regenerate();



        return redirect()->route('showLanding');
    }
}
