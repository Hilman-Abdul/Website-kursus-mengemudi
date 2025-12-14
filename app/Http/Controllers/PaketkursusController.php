<?php

namespace App\Http\Controllers;

use App\Models\PaketKursus;
use Illuminate\Http\Request;

class PaketKursusController extends Controller
{
    // Tampilkan semua paket
    public function index()
    {
        $paket = PaketKursus::all();
        return view('admin.paket_kursus.index', compact('paket'));
    }

    // Form tambah paket
    public function create()
    {
        return view('admin.paket_kursus.create');
    }

    // Simpan paket baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|integer',
            'waktu_pertemuan' => 'required|string|max:100',
            'jenis_paket' => 'required|in:manual,matic',
        ]);

        PaketKursus::create($request->only([
            'user_id', 'nama_paket', 'harga_paket', 'waktu_pertemuan', 'jenis_paket'
        ]));

        return redirect()->route('admin.paket_kursus.index')->with('success', 'Paket berhasil ditambahkan');
    }

    // Form edit paket
    public function edit($id)
    {
        $paket = PaketKursus::findOrFail($id);
        return view('admin.paket_kursus.edit', compact('paket'));
    }

    // Update paket
    public function update(Request $request, $id)
    {
        $paket = PaketKursus::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_paket' => 'required|string|max:255',
            'harga_paket' => 'required|integer',
            'waktu_pertemuan' => 'required|string|max:100',
            'jenis_paket' => 'required|in:manual,matic',
        ]);

        $paket->update($request->only([
            'user_id', 'nama_paket', 'harga_paket', 'waktu_pertemuan', 'jenis_paket'
        ]));

        return redirect()->route('admin.paket_kursus.index')->with('success', 'Paket berhasil diperbarui');
    }

    // Hapus paket
    public function destroy($id)
    {
        PaketKursus::findOrFail($id)->delete();
        return redirect()->route('admin.paket_kursus.index')->with('success', 'Paket berhasil dihapus');
    }
}
