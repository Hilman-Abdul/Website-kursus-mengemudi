<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRatingController extends Controller
{
    // tampilkan form
    public function create()
    {
        return view('rating.form');
    }

    // simpan rating
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255'
        ]);

        Rating::create([
            'user_id' => Auth::id(),
            'komentar' => $request->komentar,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil dikirim!');
    }

    // ambil semua rating untuk ditampilkan di landing page
    public function index()
    {
        $ratings = Rating::with('user')->latest()->get();
        return view('frontend.dashboard', compact('ratings'));
    }
}
