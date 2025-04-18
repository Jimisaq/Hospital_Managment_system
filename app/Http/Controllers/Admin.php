<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// Validate the request
use Illuminate\Validation\ValidationException;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    //function to show the add user form
    public function adduser()
    {
        return view('admin.add_user');
    }
    //save user
    public function saveuser(Request $request)
    {

        try {
           $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:doctor,receptionist,pharmacist',
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            // Create the user
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);
            $user->role = $validatedData['role'];
            $user->phone = $validatedData['phone'];
            $user->address = $validatedData['address'];
            $user->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'User added successfully');
        } catch (ValidationException $e) {
            // Return validation error messages
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error saving user: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }

    public function analytics()
    {
        // Fetch data for analytics
        $totalUsers = \App\Models\User::count();
        $activeUsers = 20; // \App\Models\User::where('is_active', true)->count();
        $newUsers = 10; // \App\Models\User::whereMonth('created_at', now()->month)->count();
        $recentActivities =["Activity one", "Activity two","Activity three"]; // \App\Models\ActivityLog::latest()->take(10)->get()?:null;
        $serverUptime = 100; //shell_exec('uptime'); // Example for server uptime
        $dbQueries = null; // \DB::getQueryLog(); // Enable query log before using this
        $errorLogs =500; // \App\Models\ErrorLog::count(); // Example for error logs

        // Pass data to the view
        return view('admin.analytics', compact(
            'totalUsers',
            'activeUsers',
            'newUsers',
            'recentActivities',
            'serverUptime',
            'dbQueries',
            'errorLogs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
