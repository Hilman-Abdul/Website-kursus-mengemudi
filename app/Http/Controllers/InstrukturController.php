<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    // Tampilkan semua instruktur
    public function index()
    {
        $instrukturs = Instruktur::all();
        return view('admin.instruktur.index', compact('instrukturs'));
    }

    // Form create
    public function create()
    {
        return view('admin.instruktur.create');
    }

    // Proses create instruktur
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'keahlian' => 'required|in:Mobil Manual,Mobil Matic',
        ]);

        Instruktur::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('instruktur.index')
                         ->with('success', 'Instruktur berhasil ditambahkan!');
    }

    // Form edit instruktur
    public function edit($id)
    {
        $instruktur = Instruktur::findOrFail($id);
        return view('admin.instruktur.edit', compact('instruktur'));
    }

    // Proses update instruktur
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'keahlian' => 'required|in:Mobil Manual,Mobil Matic',
        ]);

        $instruktur = Instruktur::findOrFail($id);

        $instruktur->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('instruktur.index')
                         ->with('success', 'Instruktur berhasil diperbarui!');
    }

    // Hapus instruktur
    public function destroy($id)
    {
        Instruktur::findOrFail($id)->delete();

        return redirect()->route('instruktur.index')
                         ->with('success', 'Instruktur berhasil dihapus!');
    }
}
