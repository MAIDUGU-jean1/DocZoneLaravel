<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function UserIndex()
    {


        return view('User.Patient.index');
    }
    //
}
