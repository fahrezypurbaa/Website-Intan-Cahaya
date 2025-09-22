<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\RegistrationAdminController;
use App\Http\Controllers\Admin\ScheduleAdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\GalleryPublicController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
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

// Galeri Public
Route::get('/galeri', [GalleryPublicController::class, 'index'])->name('galeri');

// Layanan & Training Frontend
Route::get('/layanan', [LayananController::class,'index'])->name('layanan.index');
Route::get('/layanan/{slug}', [LayananController::class,'show'])->name('layanan.show');

// Jadwal 2025 & Schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::get('/download-jadwal-2025', [ScheduleController::class, 'download'])->name('schedule.download');

// Form Registrasi User
Route::get('/registration', [RegistrationController::class, 'create'])->name('registration.form');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/registration/success', [RegistrationController::class, 'success'])->name('registration.success');

// Admin Routes (backend, dengan prefix & middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // Trainings
    Route::resource('trainings', TrainingController::class);

    // Galleries
    Route::resource('galleries', AdminGalleryController::class);

    // Contact
    Route::get('contacts', [\App\Http\Controllers\Admin\ContactAdminController::class, 'index'])->name('contacts.index');



    // Registrasi Management
    Route::get('registrations', [RegistrationAdminController::class, 'index'])->name('registrations.index');
});

require __DIR__.'/auth.php';
