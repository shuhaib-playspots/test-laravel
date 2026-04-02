<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdmissionController;
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

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
