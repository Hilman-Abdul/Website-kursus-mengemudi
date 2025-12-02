<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketKursus;
use Illuminate\Support\Facades\Auth;

class UserPaketController extends Controller
{
    public function pilihPaket(Request $request)
    {
        // Hapus paket lama jika ada (agar tidak double)
        PaketKursus::where('user_id', Auth::id())->delete();

        // Simpan paket yang dipilih user
        $paket = PaketKursus::create([
            'user_id' => Auth::id(),
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga,
            'waktu_pertemuan' => $request->waktu ?? '-'
        ]);

        return redirect()->route('jadwal.user');
    }

    public function batal()
    {
        PaketKursus::where('user_id', Auth::id())->delete();
        return redirect()->route('frontend.dashboard');
    }
}
