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
use App\Http\Controllers\UserTransaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminRatingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserJadwalController;
use App\Http\Controllers\AdminNotifikasiController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::view('/', 'frontend.loading_screen')->name('frontend.loading_screen');
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('frontend.dashboard');
Route::view('/tentang', 'frontend.tentang')->name('frontend.tentang');
Route::view('/kontak', 'frontend.kontak')->name('frontend.kontak');
Route::view('/notifikasi', 'frontend.notifikasi')->name('frontend.notifikasi');
Route::get('/info-user', [UserController::class, 'info'])->name('frontend.infouser');
Route::get('/info-user1', [JadwalController::class, 'infoUser'])->name('info.user');



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

    // FORM DATA DIRI
    Route::get('/lengkapi-data', [DataDiriController::class, 'index'])->name('data.lengkapi');
    Route::post('/lengkapi-data', [DataDiriController::class, 'store'])->name('data.simpan');

    /*
    |--------------------------------------------------------------------------
    | ROUTES SETELAH DATA DIRI LENGKAP
    |--------------------------------------------------------------------------
    | Gunakan middleware CheckUserFlow untuk cek login & data diri
    */
    Route::middleware(['data.lengkap'])->group(function () {


        // PROFILE
        Route::get('/profile', [ProfileController::class, 'index'])->name('frontend.profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('frontend.profile.update');

        // RATING
        Route::get('/rating', [UserRatingController::class, 'create'])->name('rating.form');
        Route::post('/rating', [UserRatingController::class, 'store'])->name('rating.store');

        // PAKET
        Route::get('/paket', [FrontendController::class, 'paket'])->name('frontend.paket');
        Route::post('/pilih-paket', [UserPaketController::class, 'pilihPaket'])->name('pilih.paket');
        Route::get('/batalkan-paket', [UserPaketController::class, 'batal'])->name('paket.batal');

        // JADWAL
        Route::get('/jadwal', [UserJadwalController::class, 'userIndex'])->name('jadwal.user');
        Route::post('/jadwal/store', [UserJadwalController::class, 'pilihJadwal'])->name('jadwal.store');
        Route::get('/jadwal/booked', [UserJadwalController::class, 'getBookedDates'])->name('jadwal.booked');

        // TRANSAKSI
        Route::get('/transaksi', [UserTransaksiController::class, 'userForm'])->name('frontend.transaksi');
        Route::post('/transaksi/store', [UserTransaksiController::class, 'store'])->name('transaksi.store');
        Route::view('/transaksi/sukses', 'frontend.sukses')->name('frontend.sukses');

    });
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PREFIX: /admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
     Route::get('/notifikasi', [App\Http\Controllers\AdminNotifikasiController::class, 'index'])
        ->name('notifikasi');

    Route::get('/notifikasi/peserta', [App\Http\Controllers\AdminNotifikasiController::class, 'peserta'])
        ->name('notifikasi.peserta');

    Route::get('/notifikasi/transaksi', [App\Http\Controllers\AdminNotifikasiController::class, 'transaksi'])
        ->name('notifikasi.transaksi');

    // LOGIN ADMIN
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login.page');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');

    // LOGOUT ADMIN
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // DASHBOARD ADMIN
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // CRUD ADMIN
    Route::resource('instruktur', InstrukturController::class);
    Route::resource('users', UserController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('paket_kursus', PaketKursusController::class);
    Route::resource('transaksi', TransaksiController::class); // atau UserTransaksiController
    Route::resource('rating', AdminRatingController::class);
});
