<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Tampilkan semua jadwal (admin)
    public function index()
    {
        $jadwal = Jadwal::with('user')->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    // Form tambah jadwal
    public function create()
    {
        $users = User::all(); // untuk memilih user
        return view('admin.jadwal.create', compact('users'));
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|exists:users,id',
            'tanggal1'     => 'required|date',
            'jam_mulai1'   => 'required|date_format:H:i',
            'jam_selesai1' => 'required|date_format:H:i|after:jam_mulai1',
            'tanggal2'     => 'nullable|date',
            'jam_mulai2'   => 'nullable|date_format:H:i',
            'jam_selesai2' => 'nullable|date_format:H:i|after:jam_mulai2',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'jenis_paket'  => 'required|in:manual,matic',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Form edit jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $users = User::all(); // untuk memilih user
        return view('admin.jadwal.edit', compact('jadwal', 'users'));
    }

    // Update jadwal
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'user_id'      => 'required|exists:users,id',
            'tanggal1'     => 'required|date',
            'jam_mulai1'   => 'required|date_format:H:i',
            'jam_selesai1' => 'required|date_format:H:i|after:jam_mulai1',
            'tanggal2'     => 'nullable|date',
            'jam_mulai2'   => 'nullable|date_format:H:i',
            'jam_selesai2' => 'nullable|date_format:H:i|after:jam_mulai2',
            'gender_user'  => 'required|in:L,P',
            'jenis_paket'  => 'required|in:manual,matic',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function infoUser()
{
    $user = Auth::user();

    // Ambil jadwal berdasarkan user login
    $jadwal = Jadwal::where('user_id', $user->id)->first();

    return view('frontend.infouser', compact('user', 'jadwal'));
}

}
