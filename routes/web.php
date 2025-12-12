<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactAdminController;
// Frontend Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\RegistrationAdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\TrainingMaterialController;
use App\Http\Controllers\Admin\TrainingRundownController;
use App\Http\Controllers\ArticleController;
// Admin Controllers
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryPublicController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LegalitasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Frontend / Public)
|--------------------------------------------------------------------------
*/

// Home
Route::view('/', 'home')->name('home');

// Tentang Perusahaan
Route::view('/tentang-perusahaan', 'tentang-perusahaan')->name('tentang.perusahaan');

// Hubungi Kami
Route::view('/hubungi-kami', 'hubungi-kami')->name('hubungi-kami');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

// Legalitas
Route::get('/legalitas', [LegalitasController::class, 'index'])->name('legalitas.index');

// SEO Friendly Gallery Route
Route::get('/galeri', [GalleryPublicController::class, 'index'])->name('galeri');
Route::get('/galeri/category/{slug}', [GalleryPublicController::class, 'category'])
     ->name('galeri.category');

// LISTING UTAMA (sudah ada)
Route::get('/layanan/{categorySlug?}', [LayananController::class, 'index'])
    ->name('layanan.index');

// PAGINATION TANPA KATEGORI → /layanan/page/5
Route::get('/layanan/page/{page}', [LayananController::class, 'index'])
    ->where('page', '[0-9]+')
    ->name('layanan.page');

// PAGINATION DENGAN KATEGORI → /layanan/k3/page/5
Route::get('/layanan/{categorySlug}/page/{page}', [LayananController::class, 'index'])
    ->where(['categorySlug' => '.*', 'page' => '[0-9]+'])
    ->name('layanan.pagination');
    
// DETAIL TRAINING
Route::get('/layanan/detail/{slug}', [LayananController::class, 'show'])
    ->name('layanan.show');

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

// Artikel (Blog)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Training Brochure
Route::get('/trainings/{training}/brochure', [TrainingController::class, 'downloadBrochure'])
    ->name('trainings.brochure');

// Serve Training Image
Route::get('/trainings/image/{filename}', function ($filename) {
    $path = storage_path("app/public/trainings/{$filename}");

    abort_unless(file_exists($path), 404);

    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
    ]);
})->name('trainings.image');

// Alternative storage access
Route::get('/storage/trainings/{filename}', function ($filename) {
    $path = storage_path("app/public/trainings/{$filename}");

    abort_unless(file_exists($path), 404);

    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
    ]);
});

/*
|--------------------------------------------------------------------------
| Auth Routes
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
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Kontak (Hubungi Kami)
        Route::get('contacts', [ContactAdminController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{id}', [ContactAdminController::class, 'show'])->name('contacts.show');

        // Trainings
        Route::resource('trainings', TrainingController::class);

        // Training Materials
        Route::resource('materials', TrainingMaterialController::class);

        // Training Rundowns
        Route::resource('rundowns', TrainingRundownController::class);

        // Galeri
        Route::resource('galleries', AdminGalleryController::class);

        // Pendaftaran
        Route::get('/registrations', [RegistrationAdminController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/export', [RegistrationAdminController::class, 'export'])->name('registrations.export');

        // Artikel Admin
        Route::resource('articles', AdminArticleController::class);

        // Test Telegram Service
        Route::get('/_test-telegram-class', function () {
            return response()->json(['exists' => class_exists(TelegramService::class)]);
        });
    });

require __DIR__.'/auth.php';
