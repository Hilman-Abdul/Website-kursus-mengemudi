<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis'; // pakai nama tabel sesuai migration
    protected $fillable = [
        'user_id',
        'instruktur_id',
        'paket_id',
        'jadwal_id',
        'nama',
        'nama_paket',
        'harga_paket',
        'tanggal',
        'metode_pembayaran',
    ];

    // RELASI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(jadwal::class);
    }

    public function paket()
    {
        return $this->belongsTo(PaketKursus::class, 'paket_id');
    }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
