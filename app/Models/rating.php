<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'komentar',
        'pekerjaan' // Ini adalah pekerjaan, bukan nilai rating. Kita asumsikan nilai rating disimpan di kolom lain (misal: 'rating') jika ada.
    ];

    // Relasi ke User
    // Asumsi kamu punya Model App\Models\User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}