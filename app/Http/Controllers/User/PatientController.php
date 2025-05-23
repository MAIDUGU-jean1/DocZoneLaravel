<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function UserIndex()
    {

       $doctors = User::all();
      // dd($doctors);
        return view('User.Patient.index', compact('doctors'));
    }
    //
}
