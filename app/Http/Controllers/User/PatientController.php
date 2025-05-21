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

        return view('User.Patient.index', compact('doctors'));
    }
    //
}
