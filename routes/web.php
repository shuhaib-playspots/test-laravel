<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Get Started / Admission
Route::get('/get-started', [AdmissionController::class, 'show'])->name('get-started');
Route::post('/get-started', [AdmissionController::class, 'store'])->name('get-started.store');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected admin routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admissions', [AdminAdmissionController::class, 'index'])->name('admissions.index');
    Route::patch('/admissions/{id}/status', [AdminAdmissionController::class, 'updateStatus'])->name('admissions.updateStatus');
});
