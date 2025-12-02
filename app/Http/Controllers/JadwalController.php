<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Tampilkan semua jadwal
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    // Form create jadwal
    public function create()
    {
        return view('admin.jadwal.create');
    }

    // Proses create jadwal
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nama_paket' => 'required',
            'jam' => 'required',      // waktu
            'tanggal' => 'required|date',  // tanggal
        ]);

        Jadwal::create([
            'nama' => $request->nama,
            'nama_paket' => $request->nama_paket,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    // Form edit jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    // Proses update jadwal
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nama_paket' => 'required',
            'jam' => 'required',
            'tanggal' => 'required|date',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'nama' => $request->nama,
            'nama_paket' => $request->nama_paket,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();

        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil dihapus!');
    }
}
