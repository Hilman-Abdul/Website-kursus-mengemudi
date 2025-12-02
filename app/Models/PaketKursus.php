<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketKursus extends Model
{
    use HasFactory;

    protected $table = 'paket_kursus';

    protected $fillable = [
        'user_id',
        'nama_paket',
        'harga_paket',
        'waktu_pertemuan',
    ];

    // Relasi ke Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
