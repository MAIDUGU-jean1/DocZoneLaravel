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

} else{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'role' => 'nullable|in:patient,doctor',
        'specialization' => 'required_if:role,doctor|string|nullable|max:255',
        'password' => 'required|string|confirmed|min:6',
        // 'terms' => 'accepted', 
    ]);
    

}
        
           User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'role_id' => 1,
                'specialistion' => $validated['role'] === 'doctor' ? $validated['specialization'] : null,
                'password' => Hash::make($validated['password']),
            ]);
           
         dd($request->all());
        
            return redirect()->back()->with('success', 'Registration successful!');
        }
        
    }

