<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminNotifikasiController extends Controller
{
    // Halaman utama notifikasi (gambar yang kamu kirim)
    public function index()
    {
        $pesertaBaru = User::whereDate('created_at', Carbon::today())->count();
        $transaksiBaru = Transaksi::whereDate('created_at', Carbon::today())->count();

        return view('admin.notifikasi.index', compact('pesertaBaru', 'transaksiBaru'));
    }

    // Detail peserta baru
    public function peserta()
    {
        $peserta = User::orderBy('created_at', 'desc')->get();
        return view('admin.notifikasi.peserta', compact('peserta'));
    }

    // Detail transaksi baru
    public function transaksi()
    {
        $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
        return view('admin.notifikasi.transaksi', compact('transaksi'));
    }
}
