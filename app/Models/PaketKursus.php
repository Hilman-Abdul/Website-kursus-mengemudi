<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketKursus extends Model
{
    use HasFactory;

    // Nama tabel sesuai migration kamu
    protected $table = 'paket_kursus'; 

    // WAJIB: Kolom yang sesuai dengan Migration dan form kamu
    protected $fillable = [
        'user_id',
        'nama_paket',
        'harga_paket',
        'waktu_pertemuan',
    ];

    // Jika kamu ingin relasi ke user:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}