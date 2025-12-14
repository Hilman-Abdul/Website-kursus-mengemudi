<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketKursus;
use Illuminate\Support\Facades\Auth;

class UserPaketController extends Controller
{
    public function pilihPaket(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama_paket' => 'required',
            'waktu' => 'required',
            'harga' => 'required|numeric',
            'jenis_paket' => 'required|in:manual,matic',
        ]);

        // HAPUS paket lama user (agar tidak double)
        PaketKursus::where('user_id', Auth::id())->delete();

        // SIMPAN paket baru ke database
        $paket = PaketKursus::create([
            'user_id'        => Auth::id(),
            'nama_paket'     => $request->nama_paket,
            'harga_paket'    => $request->harga,
            'jenis_paket'    => $request->jenis_paket,
            'waktu_pertemuan'=> $request->waktu,
        ]);

        // SIMPAN KE SESSION
        session(['paket' => $paket->toArray()]);

        return redirect()->route('jadwal.user')
            ->with('success', 'Silakan pilih jadwal.');
    }

    public function batal()
    {
        PaketKursus::where('user_id', Auth::id())->delete();
        session()->forget('paket');

        return redirect()->route('frontend.dashboard');
    }
}
