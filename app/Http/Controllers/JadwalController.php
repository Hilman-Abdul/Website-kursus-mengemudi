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

    // Proses create jadwal (FIXED)
    public function store(Request $request)
    {
        // Validasi disesuaikan dengan kolom di Migration
        $request->validate([
            'user_id'       => 'required|integer', // Asumsi kamu memasukkan ID User
            'tanggal1'      => 'required|date',
            'jam_mulai1'    => 'required',
            'jam_selesai1'  => 'required',
            'jenis_paket'   => 'required|in:manual,matic',
            'gender_user'   => 'required|in:L,P',
            
            // Kolom nullable/opsional
            'tanggal2'      => 'nullable|date',
            'jam_mulai2'    => 'nullable',
            'jam_selesai2'  => 'nullable',
        ]);

        // Field yang disimpan HARUS sesuai dengan kolom di Migration
        Jadwal::create([
            'user_id'       => $request->user_id,
            'tanggal1'      => $request->tanggal1,
            'jam_mulai1'    => $request->jam_mulai1,
            'jam_selesai1'  => $request->jam_selesai1,
            'jenis_paket'   => $request->jenis_paket,
            'gender_user'   => $request->gender_user,
            
            // Optional
            'tanggal2'      => $request->tanggal2,
            'jam_mulai2'    => $request->jam_mulai2,
            'jam_selesai2'  => $request->jam_selesai2,
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

    // Proses update jadwal (FIXED)
    public function update(Request $request, $id)
    {
        // Validasi disesuaikan
        $request->validate([
            'user_id'       => 'required|integer',
            'tanggal1'      => 'required|date',
            'jam_mulai1'    => 'required',
            'jam_selesai1'  => 'required',
            'jenis_paket'   => 'required|in:manual,matic',
            'gender_user'   => 'required|in:L,P',

            // Kolom nullable/opsional
            'tanggal2'      => 'nullable|date',
            'jam_mulai2'    => 'nullable',
            'jam_selesai2'  => 'nullable',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'user_id'       => $request->user_id,
            'tanggal1'      => $request->tanggal1,
            'jam_mulai1'    => $request->jam_mulai1,
            'jam_selesai1'  => $request->jam_selesai1,
            'jenis_paket'   => $request->jenis_paket,
            'gender_user'   => $request->gender_user,
            
            // Optional
            'tanggal2'      => $request->tanggal2,
            'jam_mulai2'    => $request->jam_mulai2,
            'jam_selesai2'  => $request->jam_selesai2,
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