<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'jenis_kelamin',
        'keahlian',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
