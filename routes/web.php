<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::get('/',[HomeController::class,'index']);

// Francis: Changed '/home' to '/redirect' and protect with 'auth'
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth');

// Francis: Dashboard route (optional: only needed if you directly access /dashboard)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Route to admin dashboard when button is pressed
Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->name('admin.dashboard')->middleware('auth');

//Route to doctor dashboard when button is pressed
Route::get('/doctor/dashboard', function () {
    return view('admin.doctor.home');
})->name('doctor.dashboard')->middleware('auth');

//Route to receptionist dashboard when button is pressed
Route::get('/receptionist/dashboard', function () {
    return view('admin.receptionist.home');
})->name('receptionist.dashboard')->middleware('auth');

//Route to pharmacist dashboard when button is pressed
Route::get('/pharmacist/dashboard', function () {
    return view('pharmacist.home');
})->name('pharmacist.dashboard')->middleware('auth');

//route ton show all users
Route::get('admin/users',[Admin::class,'index'])->name('users')->middleware('auth');
Route::get('/admin/users/search', [Admin::class, 'search'])->name('users.search');
//view user profile
Route::get('admin/users/{id}',[Admin::class,'show'])->name('profile.view')->middleware('auth');
//update user profile
Route::put('admin/users/update/{id}', [Admin::class, 'updateUser'])->name('profile.edit')->middleware('auth');
//route to add user form
Route::get('admin/adduser',[Admin::class,'adduser'])->name('adduser')->middleware('auth');
//route to add user
Route::post('admin/adduser',[Admin::class,'saveuser'])->name('saveuser')->middleware('auth');

//route to analytics for admin
Route::get('admin/analytics',[Admin::class,'analytics'])->name('admin.dashboard')->middleware('auth');

//view your profile as a user
Route::get('user/profile/{id}', [Admin::class, 'viewprofile'])->name('user.profile')->middleware('auth');

//view all recent activities
Route::get('admin/recentActivities',[Admin::class,'recentActivities'])->name('recent.activities')->middleware('auth');

//activity details
Route::get('/activities/{id}', [Admin::class, 'showActivity'])->name('activities.show');

//reports
Route::get('/admin/reports', [Admin::class, 'reports'])->name('admin.reports')->middleware('auth');

Route::get('/doctor/search-patients', [DoctorController::class, 'searchPatients'])->name('doctor.searchPatients');

Route::get('/doctor/patient/{patientId}/diagnosis', [DoctorController::class, 'showDiagnosisForm'])->name('doctor.showDiagnosisForm');

Route::post('/doctor/patient/{patientId}/diagnosis', [DoctorController::class, 'submitDiagnosisForm'])->name('doctor.submitDiagnosisForm');

Route::get('/doctor/patient/{patientId}/medical-records', [DoctorController::class, 'showMedicalRecords'])->name('doctor.showMedicalRecords');

Route::prefix('pharmacist')->middleware('auth')->group(function () {
    Route::get('/inventory', [App\Http\Controllers\PharmacistInventoryController::class, 'index'])->name('pharmacist.inventory.index');
    Route::get('/inventory/create', [App\Http\Controllers\PharmacistInventoryController::class, 'create'])->name('pharmacist.inventory.create');
    Route::post('/inventory', [App\Http\Controllers\PharmacistInventoryController::class, 'store'])->name('pharmacist.inventory.store');
    Route::get('/inventory/{id}/edit', [App\Http\Controllers\PharmacistInventoryController::class, 'edit'])->name('pharmacist.inventory.edit');
    Route::put('/inventory/{id}', [App\Http\Controllers\PharmacistInventoryController::class, 'update'])->name('pharmacist.inventory.update');

    Route::get('/prescriptions', [App\Http\Controllers\PharmacistPrescriptionController::class, 'index'])->name('pharmacist.prescriptions.index');
    Route::post('/prescriptions/{id}/approve', [App\Http\Controllers\PharmacistPrescriptionController::class, 'approve'])->name('pharmacist.prescriptions.approve');
    Route::post('/prescriptions/{id}/deny', [App\Http\Controllers\PharmacistPrescriptionController::class, 'deny'])->name('pharmacist.prescriptions.deny');
});
