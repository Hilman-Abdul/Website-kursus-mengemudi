<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    // Halaman rating untuk user
    public function index()
    {
        return view('frontend.rating');
    }

    // Simpan rating dari user
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'komentar' => 'nullable',
            'pekerjaan' => 'nullable',
        ]);

        Rating::create([
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'pekrjaan' => $request->pekerjaan,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil dikirim!');
    }
}
