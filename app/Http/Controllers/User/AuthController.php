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
            'experience' => $isPatient ? 'nullable' : 'required',
            'profile_picture' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);

        $imagePath = $request->file('profile_picture')->store('profiles', 'public');

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'specialization' => $validated['specialization'] ?? null,
            'experience' => $validated['experience'] ?? null,
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

            if ($user->role === 'doctor') {
                if ($user->verification == 0) {
                    return redirect()->back()->with('error', 'Your account is not verified yet.');
                }
                return redirect()->route('doctorindex');
            }

            return redirect()->route('ShowUserLanding')->with('success', 'You have logged in successfully!');
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
