<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'nama_paket',
        'harga_paket',
        'tanggal',
        'instruktur',
        'metode_pembayaran',
    ];
}
