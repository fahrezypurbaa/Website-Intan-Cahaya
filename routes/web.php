<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\RegistrationAdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryPublicController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Frontend / Public)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', fn () => view('home'))->name('home');

// Tentang Perusahaan
Route::get('/tentang-perusahaan', fn () => view('tentang-perusahaan'))->name('tentang.perusahaan');

// Hubungi Kami
Route::get('/hubungi-kami', fn () => view('hubungi-kami'))->name('hubungi-kami');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

// Galeri Public
Route::get('/galeri', [GalleryPublicController::class, 'index'])->name('galeri');

// Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{slug}', [LayananController::class, 'show'])->name('layanan.show');

// Jadwal 2025
Route::get('/schedule', fn () => view('schedule'))->name('schedule');
Route::get('/schedule/download', fn () => response()->download(public_path('files/jadwal-2025.pdf')))
    ->name('schedule.download');

// Form Registrasi User
Route::get('/registration', [RegistrationController::class, 'create'])->name('registration.form');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/registration/success', [RegistrationController::class, 'success'])->name('registration.success');

// Articles (Frontend Blog)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze default)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Backend)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Trainings
    Route::resource('trainings', TrainingController::class);

    // Galleries
    Route::resource('galleries', AdminGalleryController::class);

    // Contacts
    Route::get('contacts', [ContactAdminController::class, 'index'])->name('contacts.index');

    // Registrations
    Route::get('registrations', [RegistrationAdminController::class, 'index'])->name('registrations.index');

    // Articles (Admin)
    Route::resource('articles', AdminArticleController::class);
    Route::resource('articles', ArticleController::class)->except(['show']);

});

require __DIR__.'/auth.php';
