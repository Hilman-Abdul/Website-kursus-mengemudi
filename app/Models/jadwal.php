<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    // WAJIB: Kolom yang sesuai dengan Migration kamu harus ada di sini.
    protected $fillable = [
        'user_id',
        'tanggal1',
        'jam_mulai1',
        'jam_selesai1',
        'tanggal2',
        'jam_mulai2',
        'jam_selesai2',
        'gender_user',
        'jenis_paket',
    ];

    // Jika kamu ingin relasi ke user, tambahkan ini:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}