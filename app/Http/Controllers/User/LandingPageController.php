<?php

namespace App\Http\Controllers\User;
use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function Index()
    {

        return view('Landing.index');
    }
    //Login behind the testimony post
    public function testimony(Request $request){
        
       $testimony = Testimony::create([
        'name' => Auth::user()->name,
        'testimony' => $request->testimony,
        'profile_picture' => Auth::user()->profile_picture,
        'date' => Auth::user()->created_at,
        'rating' => $request->rating,
    ]);
       dd('Testimonial posted');
      
    }

    public function blogs(Request $request){
        
    }
}
