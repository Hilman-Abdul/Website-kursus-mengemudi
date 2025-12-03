<?php

namespace App\Http\Controllers;

use App\Models\PaketKursus;
use Illuminate\Http\Request;

class PaketKursusController extends Controller
{
    /**
     * Menampilkan daftar paket kursus
     */
    public function index()
    {
        $paket = PaketKursus::all();
        return view('admin.paket_kursus.index', compact('paket'));
    }

    /**
     * Menampilkan form untuk menambahkan paket kursus
     */
    public function create()
    {
        return view('admin.paket_kursus.create');
    }

    /**
     * Menyimpan data paket kursus baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            // Tambahkan validasi user_id, asumsikan ini harus berupa angka
            'user_id' => 'required|integer', 
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'waktu_pertemuan' => 'required|string|max:255',
        ]);

        // Menyimpan data paket kursus
        PaketKursus::create([
            'user_id' => $request->user_id, 
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'waktu_pertemuan' => $request->waktu_pertemuan,
        ]);

        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil ditambahkan');
    }

    /**
     * Menampilkan form untuk mengedit paket kursus
     */
    public function edit($id)
    {
        $paket = PaketKursus::findOrFail($id);
        return view('admin.paket_kursus.edit', compact('paket'));
    }

    /**
     * Mengupdate data paket kursus
     */
    public function update(Request $request, $id)
    {
        $paket = PaketKursus::findOrFail($id);

        // Validasi input
        $request->validate([
            'user_id' => 'required|integer',
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'waktu_pertemuan' => 'required|string|max:255',
        ]);

        // Mengupdate data paket kursus
        $paket->update([
            'user_id' => $request->user_id, // Tambahkan update user_id
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'waktu_pertemuan' => $request->waktu_pertemuan,
        ]);

        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil diperbarui');
    }

    /**
     * Menghapus data paket kursus
     */
    public function destroy($id)
    {
        PaketKursus::findOrFail($id)->delete();
        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil dihapus');
    }
}