<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

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
        Transaksi::create([
            'nama' => $request->nama,
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'tanggal' => date('Y-m-d'), // otomatis
            'instruktur' => $request->instruktur,
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
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'nama' => $request->nama,
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'instruktur' => $request->instruktur,
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