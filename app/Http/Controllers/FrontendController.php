<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class FrontendController extends Controller
{
    // Halaman dashboard publik
    public function dashboard()
    {
        // Ambil semua rating beserta relasi user
        $ratings = Rating::with('user')->latest()->get();

        return view('frontend.dashboard', compact('ratings'));
    }
}