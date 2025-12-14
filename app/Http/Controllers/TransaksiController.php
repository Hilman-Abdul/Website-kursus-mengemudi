<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\PaketKursus;
use App\Models\Instruktur;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Tampilkan semua transaksi
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'paket', 'instruktur', 'jadwal'])->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    // Form tambah transaksi
    public function create()
    {
        $users       = User::all();
        $pakets      = PaketKursus::all();
        $instrukturs = Instruktur::all();
        $jadwals     = Jadwal::all();

        return view('admin.transaksi.create', compact('users', 'pakets', 'instrukturs', 'jadwals'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id'             => 'required|exists:users,id',
            'paket_id'            => 'required|exists:paket_kursus,id',
            'instruktur_id'       => 'required|exists:instrukturs,id',
            'jadwal_id'           => 'required|exists:jadwals,id',
            'nama'                => 'nullable|string',
            'nama_paket'          => 'required|string',
            'harga_paket'         => 'required|integer',
            'pertemuan_1'         => 'nullable|date',
            'pertemuan_2'         => 'nullable|date',
            'metode_pembayaran'   => 'required|string',
            'tanggal'             => 'nullable|date',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Form edit transaksi
    public function edit($id)
    {
        $transaksi   = Transaksi::findOrFail($id);
        $users       = User::all();
        $pakets      = PaketKursus::all();
        $instrukturs = Instruktur::all();
        $jadwals     = Jadwal::all();

        return view('admin.transaksi.edit', compact('transaksi', 'users', 'pakets', 'instrukturs', 'jadwals'));
    }

    // Update transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'user_id'             => 'required|exists:users,id',
            'paket_id'            => 'required|exists:paket_kursus,id',
            'instruktur_id'       => 'required|exists:instrukturs,id',
            'jadwal_id'           => 'required|exists:jadwals,id',
            'nama'                => 'nullable|string',
            'nama_paket'          => 'required|string',
            'harga_paket'         => 'required|integer',
            'pertemuan_1'         => 'nullable|date',
            'pertemuan_2'         => 'nullable|date',
            'metode_pembayaran'   => 'required|string',
            'tanggal'             => 'nullable|date',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Hapus transaksi
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
