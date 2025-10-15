<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\RegistrationAdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\TrainingMaterialController;
use App\Http\Controllers\Admin\TrainingRundownController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryPublicController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LegalitasController;
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
Route::view('/tentang-perusahaan', 'tentang-perusahaan')->name('tentang.perusahaan');

// Hubungi Kami
Route::view('/hubungi-kami', 'hubungi-kami')->name('hubungi-kami');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

// Legalitas
Route::get('/legalitas', [LegalitasController::class, 'index'])->name('legalitas.index');

// Galeri Public
Route::get('/galeri', [GalleryPublicController::class, 'index'])->name('galeri');

// Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{slug}', [LayananController::class, 'show'])->name('layanan.show');

// Jadwal 2025
Route::view('/schedule', 'schedule')->name('schedule');
Route::get('/schedule/download', fn () => response()->download(public_path('files/jadwal-2025.pdf')))
    ->name('schedule.download');

// Form Registrasi User
Route::controller(RegistrationController::class)->group(function () {
    Route::get('/registration', 'create')->name('registration.form');
    Route::post('/registration', 'store')->name('registration.store');
    Route::get('/registration/success', 'success')->name('registration.success');
});

// Articles (Frontend Blog)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Brosur
Route::get('/trainings/{training}/brochure', [TrainingController::class, 'downloadBrochure'])
    ->name('trainings.brochure');

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
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Trainings
    Route::resource('trainings', TrainingController::class);

    // Training Materials
    Route::resource('materials', TrainingMaterialController::class);

    // Training Rundowns
    Route::resource('rundowns', TrainingRundownController::class);

    // Galleries
    Route::resource('galleries', AdminGalleryController::class);

    // Contacts
    Route::get('contacts', [ContactAdminController::class, 'index'])->name('contacts.index');

    // Registrations
    Route::get('registrations', [RegistrationAdminController::class, 'index'])->name('registrations.index');

    // Articles (Admin)
    Route::resource('articles', AdminArticleController::class);

    Route::get('/_test-telegram-class', function () {
        return response()->json([
            'exists' => class_exists(\App\Services\TelegramService::class),
        ]);
    });

});

require __DIR__.'/auth.php';
