<?php

namespace App\Http\Controllers;

use App\Models\PaketKursus;
use Illuminate\Http\Request;

class PaketKursusController extends Controller
{
    public function index()
    {
        $paket = PaketKursus::all();
        return view('admin.paket_kursus.index', compact('paket'));
    }

    public function create()
    {
        return view('admin.paket_kursus.create');
    }

    public function store(Request $request)
    {
        PaketKursus::create($request->all());
        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $paket = PaketKursus::findOrFail($id);
        return view('admin.paket_kursus.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketKursus::findOrFail($id);
        $paket->update($request->all());

        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil diperbarui');
    }

    public function destroy($id)
    {
        PaketKursus::findOrFail($id)->delete();
        return redirect()->route('paket_kursus.index')->with('success', 'Paket berhasil dihapus');
    }
}