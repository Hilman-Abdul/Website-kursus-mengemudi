<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon; // Dipakai untuk mengisi tanggal otomatis

class TransaksiController extends Controller
{
    // Tampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.transaksi.create');
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|string|max:255', // User ID (sebelumnya 'nama' di form)
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'instruktur_id' => 'required|string|max:255', // Instruktur ID (sebelumnya 'instruktur' di form)
            'metode_pembayaran' => 'required|string|max:255',
        ]);
        
        Transaksi::create([
            'user_id' => $request->user_id, // Menggunakan user_id
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'tanggal' => Carbon::now()->toDateString(), // Menggunakan Carbon untuk tanggal
            'instruktur_id' => $request->instruktur_id, // Menggunakan instruktur_id
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    // Form edit
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    // Update transaksi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'instruktur_id' => 'required|string|max:255',
            'metode_pembayaran' => 'required|string|max:255',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'user_id' => $request->user_id,
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            // Tanggal tidak diupdate di form
            'instruktur_id' => $request->instruktur_id,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    // Hapus transaksi
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}