<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function UserIndex()
    {
        // $doctors = User::with('category')->where('verification', 1)->get();
        $doctors = User::where('verification', 1)->get();

        $doctors = User::all();
        // dd($doctors);
        return view('User.Patient.index', compact('doctors'));
    }
    //
}
