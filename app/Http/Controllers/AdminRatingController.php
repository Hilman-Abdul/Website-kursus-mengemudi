<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class AdminRatingController extends Controller
{
    // Tampilkan semua rating
    public function index()
    {
        $ratings = Rating::with('user')->get(); // load relasi user
        return view('admin.rating.index', compact('ratings'));
    }

    // Hapus rating
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect()->route('admin.rating.index')
            ->with('success', 'Rating berhasil dihapus!');
    }
}
