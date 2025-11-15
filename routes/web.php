<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DataDiriController;

Route::get('/index1', function () {
    return view('frontend.index');
})->name('frontend.index');

Route::get('/dashboard1', function () {
    return view('frontend.dashboard');
})->name('frontend.dashboard');

Route::get('/dashboard2', function () {
    return view('coba1.dashboard');
})->name('coba1.dashboard');

Route::get('/coba', function () {
    return view('coba1.coba1');
})->name('coba1.coba1');

Route::get('/loading1', function () {
    return view('frontend.loading_screen');
});

Route::get('/tentang1', function () {
    return view('frontend.tentang');
})->name('frontend.tentang');

Route::get('/paket1', function () {
    return view('frontend.paket');
})->name('frontend.paket');

Route::get('/kontak1', function () {
    return view('frontend.kontak');
})->name('frontend.kontak');

Route::get('/transaksi1', function () {
    return view('frontend.transaksi');
})->name('frontend.transaksi');

Route::get('/struk', function () {
    return view('frontend.index2');
})->name('frontend.index2');

Route::get('/data_diri1', function () {
    return view('frontend.data_diri');
})->name('frontend.data_diri');

Route::get('/lengkapi-data', [App\Http\Controllers\DataDiriController::class, 'index'])->name('data.lengkapi');
Route::post('/lengkapi-data', [App\Http\Controllers\DataDiriController::class, 'store'])->name('data.simpan');

Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');

/*Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');*/

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


// Frontend CRUD User (UI Saja)
Route::get('/users', function () {
    return view('admin.users.index');
});

Route::get('/users/create', function () {
    return view('admin.users.create');
});

Route::get('/users/{id}/edit', function () {
    return view('admin.users.edit');
});

Route::get('/users', function () {
    return view('admin.users.index');
});

Route::get('/instruktur', function () {
    return view('admin.instruktur.index');
});

// Halaman tambah instruktur
Route::get('/instruktur/create', function () {
    return view('admin.instruktur.create');
});

// Halaman edit instruktur
Route::get('/instruktur/{id}/edit', function ($id) {
    return view('admin.instruktur.edit', compact('id'));
});

// Aksi hapus (sementara hanya redirect)
Route::get('/instruktur/{id}/delete', function ($id) {
    return redirect('admin/instruktur');
});
