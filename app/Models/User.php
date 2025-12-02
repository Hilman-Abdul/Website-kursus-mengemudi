<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'nik',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function paketKursus()
    {
        return $this->hasOne(\App\Models\PaketKursus::class);
    }

    public function jadwals()
    {
        return $this->hasMany(\App\Models\Jadwal::class);
    }

}
