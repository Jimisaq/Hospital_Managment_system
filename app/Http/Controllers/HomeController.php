<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

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
}
