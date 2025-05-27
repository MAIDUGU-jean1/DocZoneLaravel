<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsDashboardController extends Controller
{
    public function doctorindex()
    {
        return view('Doctordashboard.index');
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
