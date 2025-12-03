<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'transaksi';

    // Kolom yang boleh diisi (mass assignable), sesuai Migrasi
    protected $fillable = [
        'user_id',
        'nama_paket',
        'harga_paket',
        'tanggal',
        'instruktur_id',
        'metode_pembayaran',
    ];
    
    // Nonaktifkan timestamps karena tidak ada di migrasi kamu, 
    // tapi lebih baik ditambah timestamps() di migrasi.
    public $timestamps = false; 

    // Jika kamu memutuskan menambah timestamps() di migrasi, 
    // Hapus baris 'public $timestamps = false;' ini.
}