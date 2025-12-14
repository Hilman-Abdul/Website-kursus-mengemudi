<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRatingController extends Controller
{
    public function create()
    {
        return view('frontend.rating');
    }

    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:500',
            'pekerjaan' => 'nullable|string|max:100',
        ]);

        Rating::create([
            'user_id'   => Auth::id(),
            'komentar'  => $request->komentar,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect('/dashboard')->with('success', 'Rating berhasil dikirim!');
    }
}
