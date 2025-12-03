<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Tampilkan daftar semua rating (Admin)
     * Menggantikan fungsi index() dari resource CRUD
     */
    public function index()
    {
        // Load semua rating, dan ambil data user yang memberikan rating
        $ratings = Rating::with('user')->latest()->get();
        return view('admin.rating.index', compact('ratings'));
    }
    
    // Karena Admin hanya boleh Hapus (Destroy), kita abaikan create, store, edit, dan update
    // Tapi kita perlu definisikan metode kosong agar routing resource tidak error

    public function create() { /* Admin tidak membuat rating */ }
    public function store(Request $request) { /* Admin tidak menyimpan rating */ }
    public function show($id) { /* Tidak perlu show tunggal */ }
    public function edit($id) { /* Admin tidak mengedit rating user */ }
    public function update(Request $request, $id) { /* Admin tidak mengupdate rating user */ }
    
    /**
     * Hapus rating (Admin)
     * Menggantikan fungsi destroy() dari resource CRUD
     */
    public function destroy($id)
    {
        Rating::findOrFail($id)->delete();
        return redirect()->route('rating.index')->with('success', 'Rating berhasil dihapus!');
    }
}