<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientEnrollmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('home');
});

// Admin Authentication Routes
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('admin_login');
})->name('admin.login')->middleware('prevent-back-history');

//Admin login and logout routes
Route::post('/login', [AdminDashboardController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');

// Protected Admin Dashboard Routes
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    //Admin Dashboard Routes
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Route::get('/admin', [AdminDashboardController::class, 'index']);

    // PatientController Routes
    Route::get('/admin/patients', [PatientController::class, 'index'])->name('admin.patients.index');
    Route::get('/admin/patients/create', [PatientController::class, 'create'])->name('admin.patients.create');
    Route::post('/admin/patients', [PatientController::class, 'store'])->name('admin.patients.store');
    Route::get('/admin/patients/{id}', [PatientController::class, 'show'])->name('admin.patients.show');
    Route::get('/admin/patients/{id}/edit', [PatientController::class, 'edit'])->name('admin.patients.edit');
    Route::put('/admin/patients/{id}', [PatientController::class, 'update'])->name('admin.patients.update');
    Route::delete('/admin/patients/{id}', [PatientController::class, 'destroy'])->name('admin.patients.destroy');
    Route::put('/admin/patients/status/{id}', [PatientController::class, 'updateStatus'])->name('admin.patients.updateStatus');

});

// Patient Enrollment Routes
Route::get('/register', [PatientEnrollmentController::class, 'register'])->name('patient.register.form');
Route::post('/register', [PatientEnrollmentController::class, 'store'])->name('patient.register');