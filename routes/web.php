<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PrintableController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\PrintableController as AdminPrintableController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Printables
Route::get('/printables', [PrintableController::class, 'index'])->name('printables.index');
Route::get('/printables/{id}/download', [PrintableController::class, 'download'])->name('printables.download');

// Jobs
Route::get('/jobs', [CareerController::class, 'index'])->name('jobs.index');
Route::post('/jobs/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');

// Contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Get Started / Admission
Route::get('/get-started', [AdmissionController::class, 'show'])->name('get-started');
Route::post('/get-started', [AdmissionController::class, 'store'])->name('get-started.store');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected admin routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admissions', [AdminAdmissionController::class, 'index'])->name('admissions.index');
    Route::patch('/admissions/{id}/status', [AdminAdmissionController::class, 'updateStatus'])->name('admissions.updateStatus');

    Route::resource('courses', AdminCourseController::class)->except(['show']);
    Route::resource('printables', AdminPrintableController::class)->except(['show']);
    Route::resource('gallery', AdminGalleryController::class)->except(['show']);
    Route::resource('jobs', AdminCareerController::class)->except(['show']);
    Route::get('/jobs-applications', [\App\Http\Controllers\Admin\JobApplicationAdminController::class, 'index'])->name('jobs.applications');
    Route::resource('posts', AdminPostController::class)->except(['show', 'edit', 'update']);
});
