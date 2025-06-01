<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\Testimony;
use Illuminate\Http\Request;

class PatientController extends Controller
{
  public function UserIndex(Request $request)
{
    $allDoctors = User::where('role', 'doctor')->where('verification', 1)->get();
    $blogs = Blog::all(); 
    $testimonies = Testimony::all();
    $doctors = User::where('role', 'doctor')
                   ->where('verification', 1)
                   ->when($request->specialization, function ($query, $specialization) {
                       $query->where('specialization', $specialization);
                   })
                   ->paginate(8); // Adjust number per page

    return view('User.Patient.index', compact('doctors','testimonies','blogs','allDoctors'));
}

}
