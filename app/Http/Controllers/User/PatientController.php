<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
  public function UserIndex(Request $request)
{
    $doctors = User::where('role', 'doctor')
                   ->where('verification', 1)
                   ->when($request->specialization, function ($query, $specialization) {
                       $query->where('specialization', $specialization);
                   })
                   ->paginate(8); // Adjust number per page

    return view('User.Patient.index', compact('doctors'));
}

}
