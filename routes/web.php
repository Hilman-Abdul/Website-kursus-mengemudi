<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRatingController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PaketKursusController;
use App\Http\Controllers\UserPaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminRatingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserJadwalController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('frontend.loading_screen'))->name('frontend.loading_screen');

Route::get('/paket1', fn() => view('frontend.paket'))->name('frontend.paket');
Route::get('/tentang1', fn() => view('frontend.tentang'))->name('frontend.tentang');
Route::get('/kontak1', fn() => view('frontend.kontak'))->name('frontend.kontak');

Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('frontend.dashboard');

// Halaman transaksi kosong (belum isi)
Route::get('/form/transaksi', fn() => view('frontend.transaksi'))->name('frontend.transaksi');

// Rating publik
Route::get('/rating', fn() => view('frontend.rating'))->name('frontend.rating');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| USER ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Lengkapi Data Diri
    Route::get('/lengkapi-data', [DataDiriController::class, 'index'])->name('data.lengkapi');
    Route::post('/lengkapi-data', [DataDiriController::class, 'store'])->name('data.simpan');

    /*
    |--------------------------------------------------------------------------
    | USER ROUTES (DATA DIRI HARUS LENGKAP)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['data.lengkap'])->group(function () {

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('frontend.profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])
            ->name('frontend.profile.update');

        // Rating user
        Route::get('/rating/form', [UserRatingController::class, 'create'])->name('rating.form');
        Route::post('/rating', [UserRatingController::class, 'store'])->name('rating.store');

        // Pilih paket
        Route::post('/pilih-paket', [UserPaketController::class, 'pilihPaket'])->name('pilih.paket');
        Route::get('/batalkan-paket', [UserPaketController::class, 'batal'])->name('paket.batal');

        /*
        |--------------------------------------------------------------------------
        | USER — JADWAL KURSUS (FINAL)
        |--------------------------------------------------------------------------
        */
        Route::get('/jadwal', [UserJadwalController::class, 'userIndex'])->name('jadwal.user');
        Route::post('/jadwal/store', [UserJadwalController::class, 'pilihJadwal'])->name('jadwal.store');

        // API untuk cek tanggal yang sudah di-booking
        Route::get('/jadwal/booked', [UserJadwalController::class, 'getBookedDates'])
            ->name('jadwal.booked');
    });
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Login admin
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login.page');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');

    // Logout admin
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Dashboard admin
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // CRUD Admin
    Route::resource('instruktur', InstrukturController::class);
    Route::resource('users', UserController::class);
    Route::resource('jadwal', JadwalController::class);  // admin CRUD
    Route::resource('paket_kursus', PaketKursusController::class); // Rute Paket Kursus yang benar
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('rating', AdminRatingController::class);
    
    // BLOK BERIKUT DIHAPUS KARENA MENGAKIBATKAN REDUNDANSI DAN AMBIGUITAS ROUTING:
    // Route::prefix('admin')->group(function () {
    // Route::resource('paket_kursus', PaketKursusController::class);
    // });
});