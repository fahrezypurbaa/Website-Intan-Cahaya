<?php

use Illuminate\Support\Facades\Route;
use App\Services\TelegramService;

// Frontend Controllers
use App\Http\Controllers\{
    ArticleController,
    ContactController,
    GalleryPublicController,
    LayananController,
    LegalitasController,
    ProfileController,
    RegistrationController
};

// Admin Controllers
use App\Http\Controllers\Admin\{
    ArticleController as AdminArticleController,
    ContactAdminController,
    DashboardController,
    GalleryController as AdminGalleryController,
    RegistrationAdminController,
    TrainingController,
    TrainingMaterialController,
    TrainingRundownController
};

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

// Galeri Publik
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


require __DIR__ . '/auth.php';
