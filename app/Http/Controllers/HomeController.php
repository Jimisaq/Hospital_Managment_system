<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == '0') {

                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));

            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->usertype == '1') {
                // If admin, always go to admin.home
                return view('admin.home');

            } else {

                // If user, show the homepage with doctors
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }
        } else {
            // Not logged in: show user home with doctors
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request) {

        $data = new appointment;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->date = $request->date;

        $data->phone = $request->number;

        $data->message = $request->message;

        $data->doctor = $request->doctor;

        $data->status = 'In Progress';

        // Check if user is logged in before assigning user_id
        // If not logged in, redirect to login page
        
        if (Auth::id()) {

            $data->user_id = Auth::user()->id;

        } else {

            return redirect('login');
        }

        $data->save();

        // Or can decide to also send a notification email to the user
        
        return redirect()->back()->with('message', 'Appointment Request Successful. We will contact you soon.');

    }

    public function myappointment(){
        
        if(Auth::id())
        {
            if(Auth::user()->usertype==0)
            {
                $userid=Auth::user()->id;
            
                // Fetch appointments for the logged-in user
                $appoint=appointment::where('user_id',$userid)->get();
    
                // If user is logged in, show their appointments
                return view('user.my_appointment', compact('appoint'));
            }    

        } 
        else 
        {
            // If not logged in, redirect them back
            return redirect('login');
        }

    }

    public function cancel_appoint($id){

         // Check if the appointment exists before trying to delete it
        $data=appointment::find($id);

        $data->delete();
        
        return redirect()->back()->with('message', 'Appointment Cancelled Successfully.');
       
    }
}
