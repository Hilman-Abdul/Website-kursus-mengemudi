<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\PaketKursus;
use App\Models\Jadwal;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransaksiController extends Controller
{
    /**
     * TAMPILKAN HALAMAN PEMBAYARAN
     */
    public function userForm()
    {
        $user = Auth::user();

        // Ambil paket dari session (dipilih saat beli paket)
        $paketSession = session('paket');

        if (!$paketSession) {
            return redirect()->route('frontend.dashboard')
                ->with('error', 'Silakan pilih paket terlebih dahulu.');
        }

        $paket  = PaketKursus::find($paketSession['id']);
        $jadwal = Jadwal::where('user_id', $user->id)->first();

        if (!$paket || !$jadwal) {
            return redirect()->route('frontend.dashboard')
                ->with('error', 'Silakan isi jadwal terlebih dahulu.');
        }

        // Pilih instruktur otomatis berdasarkan jenis kelamin user
        $instruktur = Instruktur::where('jenis_kelamin', $user->jenis_kelamin)->first();

        return view('frontend.transaksi', compact('user', 'paket', 'jadwal', 'instruktur'));
    }



    /**
     * SIMPAN TRANSAKSI (POST dari FORM biasa)
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'paket_id'          => 'required|exists:paket_kursus,id',
            'instruktur_id'     => 'required|exists:instrukturs,id',
            'jadwal_id'         => 'required|exists:jadwals,id',
            'metode_pembayaran' => 'required',
        ]);

        $user       = Auth::user();
        $paket      = PaketKursus::find($request->paket_id);
        $jadwal     = Jadwal::find($request->jadwal_id);
        $instruktur = Instruktur::find($request->instruktur_id);

        // Simpan transaksi
        Transaksi::create([
            'user_id'       => $user->id,
            'paket_id'      => $paket->id,
            'jadwal_id'     => $jadwal->id,
            'instruktur_id' => $instruktur->id,
            'nama'          => $user->nama,
            'nama_paket'    => $paket->nama_paket,
            'harga_paket'   => $paket->harga_paket,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal'       => now()->format('Y-m-d'),
        ]);

        // kirim popup struk dengan session
        return back()->with('success', [
            'msg'    => 'Pembayaran Berhasil!',
            'metode' => $request->metode_pembayaran
        ]);
    }
}