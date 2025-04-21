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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // In `app/Http/Controllers/AdminController.php`
   public function index()
{
    $admins = User::where('role', 'admin')->get();
    $receptionists = User::where('role', 'receptionist')->get();
    $doctors = User::where('role', 'doctor')->get();
    $pharmacists = User::where('role', 'pharmacist')->get();

    return view('admin.users', compact('admins', 'receptionists', 'doctors', 'pharmacists'));
}
    //function to search for users
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('username', 'like', "%$query%")
            ->limit(10)
            ->get();

        return response()->json($users);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Return the view with the user data
        return view('admin.user_edit', compact('user'));
    }
    public function updateUser(Request $request, $id)
{
    try {
        // Validate the request for editable fields only
        $validatedData = $request->validate([
            'role' => 'required|in:admin,doctor,receptionist,pharmacist',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update only the editable fields
        $user->fill($validatedData);
        $user->save();

        // Redirect back with success message
        return redirect()->route('profile.view', $id)->with('success', 'User updated successfully.');
    } catch (ValidationException $e) {
        // Return validation error messages
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Log the error with user ID for debugging
        Log::error("Error updating user (ID: $id): " . $e->getMessage());

        // Redirect back with error message
        return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
    }
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

    public function viewprofile($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Return the profile.show view with the user data
        return view('profile.show', compact('user'));
    }
}
