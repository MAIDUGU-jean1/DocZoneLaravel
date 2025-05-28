<?php

namespace App\Http\Controllers\User;
use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\NewBlogPosted;

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
public function blogs(Request $request)
{
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profiles', 'public');
    } else {
        return back()->with('error', 'No file was uploaded.');
    }

    $blog = Blog::create([
        'name' => Auth::user()->name,
        'speciality' => Auth::user()->specialization,
        'title' => $request->title,
        'content' => $request->content,
        'profile_picture' => Auth::user()->profile_picture,
        'image' => $imagePath,
    ]);

    // Send notification to all users
    $users = User::all();
    foreach ($users as $user) {
        $user->notify(new NewBlogPosted($blog));
    }

    return redirect()->back()->with('success', 'Blog posted successfully!');
}

  public function showBooking($id)
{
    $patient = Auth::user()->name;
    $patient_id = Auth::user()->id;
    $doctor = User::findOrFail($id); // Get doctor or 404
  
    return view('User.Patient.book',compact('doctor','patient'));
}
public function confirmBook(Request $request)
{
 

    $patientId = auth()->id(); // make sure user is authenticated
 

    $appointment = new \App\Models\Appointment();
    $appointment->doctor_id = $request->doctor_id;
    $appointment->patient_id = $patientId;
    $appointment->appointment_date = $request->appointment_date;
    $appointment->appointment_time = $request->appointment_time;
    $appointment->save();
   dd($request);
    return redirect()->route('ShowUserLanding')->with('success', 'Appointment booked successfully.');
}


}
