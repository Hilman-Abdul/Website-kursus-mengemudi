<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\instruktur;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung peserta (role = user)
        $jumlah_peserta = User::where('user')->count();

        // Hitung instruktur berdasarkan gender & keahlian
        $matic_lk = Instruktur::where('keahlian', 'Matic')
                              ->where('jenis_kelamin', 'Laki-laki')
                              ->count();

        $manual_lk = Instruktur::where('keahlian', 'Manual')
                               ->where('jenis_kelamin', 'Laki-laki')
                               ->count();

        $matic_pr = Instruktur::where('keahlian', 'Matic')
                              ->where('jenis_kelamin', 'Perempuan')
                              ->count();

        $manual_pr = Instruktur::where('keahlian', 'Manual')
                               ->where('jenis_kelamin', 'Perempuan')
                               ->count();

        // Penghasilan — sementara 0 (nanti bisa dari tabel pembayaran)
        $total_income = 0;

        return view('admin.dashboard', compact(
            'jumlah_peserta',
            'matic_lk',
            'manual_lk',
            'matic_pr',
            'manual_pr',
            'total_income'
        ));
    }
}
