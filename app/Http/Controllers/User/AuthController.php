<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // This function handles user registration
    public function register(Request $request)
    {
        if ($request->role === 'patient') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable|string|max:20',
                'role' => 'nullable|in:patient,doctor',
                'password' => 'required|string|confirmed|min:6',
                'profile_picture' => 'required|mimes:png,jpeg,jpg|max:2048',
            ]);

            $imagePath = $request->file('profile_picture')->store('profiles', 'public');

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialistion' => null,
                'password' => Hash::make($validated['password']),
                'role' => $request->role,
                'profile_picture' => $imagePath,
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable|string|max:20',
                'specialization' => 'required|string|max:255',
                'password' => 'required|string|confirmed|min:6',
                'role' => 'required|in:doctor',
                'profile_picture' => 'required|mimes:png,jpeg,jpg|max:2048',
            ]);

            $imagePath = $request->file('profile_picture')->store('profiles', 'public');

                // 'terms' => 'accepted', 
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialistion' => $validated['specialization'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
                'profile_picture' => $imagePath,
            ]);
        }

        return redirect()->route('ShowUserLanding')->with('success', 'Registration successful!');
    }

    // This function handles user login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('ShowUserLanding')->with('success', 'You have logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }
}
