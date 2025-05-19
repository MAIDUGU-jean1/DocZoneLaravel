<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
//This function randles the users registeration
{
<<<<<<< HEAD
    public function register(Request $request){
           
if($request->role == 'patient'){
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'role' => 'nullable|in:patient,doctor',
        'password' => 'required|string|confirmed|min:6',
        'profile_picture' => 'required|mimes:png,jpeg,jpg, 2048'

        // 'terms' => 'accepted',
    ]);

     $imagePath = $request->file('profile_picture')->store('profiles', 'public');     
          
          User::create([
=======
    public function register(Request $request)
    {

        if ($request->role == 'patient') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable|string|max:20',
                'role' => 'nullable|in:patient,doctor',
                'password' => 'required|string|confirmed|min:6',
                // 'terms' => 'accepted',
            ]);
            User::create([
>>>>>>> 6dce89762061b36e3d4d903e84f430e2b2b59ce7
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialistion' => $validated['role'] === 'doctor' ? $validated['specialization'] : null,
                'password' => Hash::make($validated['password']),
                'role' => $request->role,
                'profile_picture' => $imagePath

            ]);
<<<<<<< HEAD
           $user->profile_picture = $imagePath;
            $user->save();
           
    return redirect()->back()->with('success', 'Registration successful!',['user' => $user]);

} else{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'specialization' => 'required_if:role,doctor|string|nullable|max:255',
        'password' => 'required|string|confirmed|min:6',
        'role' => 'required|string',
       'profile_picture' => 'required|mimes:png,jpeg,jpg|max:2048'


        // 'terms' => 'accepted', 
    ]);
        
          User::create([
=======

            dd($request->all());
        } else {
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
>>>>>>> 6dce89762061b36e3d4d903e84f430e2b2b59ce7
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'specialization' => $validated['role'] === 'doctor' ? $validated['specialization'] : null,
                'password' => Hash::make($validated['password']),
                'role' => $request->role,
                'profile_picture' => $imagePath

            ]);
<<<<<<< HEAD
            $user->profile_picture = $imagePath;
            $user->save();
           
 return redirect()->back()->with('success', 'Registration successful!', ['user' => $user]);
    
}
        }
    
        
        //This function handle the login users
    public function login(Request $request){
        $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required|string|min:6'
        ]);
      if(Auth::attempt($validated)){
            return redirect()->route('ShowUserLanding')->with('success', 'You have login succesfully!');
      }
      return redirect()->back()->with('error', 'Invalid credentials');
    }
        
}
=======
        }
>>>>>>> 6dce89762061b36e3d4d903e84f430e2b2b59ce7



        return redirect()->back()->with('success', 'Registration successful!');
    }
}
