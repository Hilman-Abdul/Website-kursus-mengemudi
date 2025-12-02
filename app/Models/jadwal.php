<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals'; // penting! pastikan ke tabel yang benar

    protected $fillable = [
        'user_id',

        'tanggal1', 'jam_mulai1', 'jam_selesai1',
        'tanggal2', 'jam_mulai2', 'jam_selesai2',

        'gender_user',
        'jenis_paket',
    ];

    /**
     * RELASI: Jadwal dimiliki oleh user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
