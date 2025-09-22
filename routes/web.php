<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return view('home');
});

// Tentang Perusahaan
Route::get('/tentang-perusahaan', function () {
    return view('tentang-perusahaan');
})->name('tentang.perusahaan');

// Hubungi Kami
Route::get('/hubungi-kami', function () {
    return view('hubungi-kami');
})->name('hubungi-kami');

Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

// Profile (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes (backend)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('trainings', TrainingController::class);
    Route::resource('participants', ParticipantController::class);
});

// Galeri Public
Route::get('/galeri', [App\Http\Controllers\GalleryPublicController::class, 'index'])->name('galeri');


// Admin (group dengan prefix & middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('galleries', AdminGalleryController::class);
});

// Jadwal 2025 & Schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::get('/download-jadwal-2025', [ScheduleController::class, 'download'])->name('schedule.download');

// 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('scheduleadmin', \App\Http\Controllers\Admin\ScheduleAdminController::class);
});


require __DIR__.'/auth.php';