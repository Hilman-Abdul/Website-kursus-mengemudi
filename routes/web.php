<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataDiriController;

Route::get('/index', function () {
    return view('frontend.index');
})->name('frontend.index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard');
})->name('frontend.dashboard');

Route::get('/loading', function () {
    return view('frontend.loading_screen');
});

Route::get('/tentang', function () {
    return view('frontend.tentang');
})->name('frontend.tentang');

Route::get('/paket', function () {
    return view('frontend.paket');
})->name('frontend.paket');

Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('frontend.kontak');

Route::get('/transaksi', function () {
    return view('frontend.transaksi');
})->name('frontend.transaksi');

Route::get('/data_diri', function () {
    return view('frontend.data_diri');
})->name('frontend.data_diri');

Route::get('/lengkapi-data', [App\Http\Controllers\DataDiriController::class, 'index'])->name('data.lengkapi');
Route::post('/lengkapi-data', [App\Http\Controllers\DataDiriController::class, 'store'])->name('data.simpan');
