<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function showJadwal($id)
    {
        // ambil jadwal
        $jadwal = Jadwal::with('user')->findOrFail($id);

        return view('pesan.jadwal-detail', [
            'jadwal' => $jadwal,
            'user' => $jadwal->user,
            'alamat' => 'Griya Bukit Jaya'
        ]);
    }
}
