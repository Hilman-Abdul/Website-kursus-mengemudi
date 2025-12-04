<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Notification; // Anda bisa mengaktifkan ini jika sudah membuat model Notification

class AdminNotificationController extends Controller
{
    /**
     * Tampilkan halaman daftar semua notifikasi (Admin).
     * * Saat ini, kita mengembalikan view dan menyiapkan array kosong 
     * untuk menampung data notifikasi yang sebenarnya nanti.
     */
    public function index()
    {
        // 🚨 TO DO: Ambil data notifikasi dari database.
        // Contoh: $notifications = Notification::latest()->paginate(20);
        
        // Mengirimkan array kosong atau data dummy jika diperlukan
        $notifications = []; 
        
        return view('admin.notifications.index', compact('notifications'));
    }
}