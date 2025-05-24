<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function UserIndex()
    {
        $doctors = User::where('verification', 1)->get();

<<<<<<< HEAD
=======
       $doctors = User::all();
      // dd($doctors);
>>>>>>> d4dd87a79fb0ef2d5fceded474e6c0f1bc7d3986
        return view('User.Patient.index', compact('doctors'));
    }
    //
}
