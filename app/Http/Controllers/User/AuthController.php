<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Handle user registration
    public function register(Request $request)
    {
        $isPatient = $request->role === 'patient';

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|confirmed|min:6',
            'role' => $isPatient ? 'nullable|in:patient,doctor' : 'required|in:doctor',
            'specialization' => $isPatient ? 'nullable' : 'required|string|max:255',
            'profile_picture' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);

        $imagePath = $request->file('profile_picture')->store('profiles', 'public');

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'specialization' => $validated['specialization'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'patient',
            'profile_picture' => $imagePath,
        ]);

        Auth::login($user);

        return redirect()->route('ShowUserLanding')->with('success', 'Registration successful!');
    }

    // Handle user login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($validated)) {
            $user = Auth::user();

            return $user->role === 'doctor'
                ? redirect()->route('doctorindex')
                : redirect()->route('ShowUserLanding');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLanding');
    }
}
