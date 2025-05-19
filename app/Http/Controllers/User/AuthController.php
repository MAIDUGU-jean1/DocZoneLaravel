<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        
if($request->role == 'patient'){
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'role' => 'nullable|in:patient,doctor',
        'password' => 'required|string|confirmed|min:6',
        // 'terms' => 'accepted',
    ]);
          User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialistion' => $validated['role'] === 'doctor' ? $validated['specialization'] : null,
                'password' => Hash::make($validated['password']),
                'role' => $request->role,

            ]);
           
         dd($request->all());

} else{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'specialization' => 'required_if:role,doctor|string|nullable|max:255',
        'password' => 'required|string|confirmed|min:6',
        'role' => 'required|string',

        // 'terms' => 'accepted', 
    ]);
          User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialization' => $validated['role'] === 'doctor' ? $validated['specialization'] : null,
                'password' => Hash::make($validated['password']),
                'role' => $request->role,

            ]);
           
         dd($request->all());
    

}
        
     
        
            return redirect()->back()->with('success', 'Registration successful!');
        }
        
    }

