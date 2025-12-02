<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // nama tabel
    protected $fillable = [
        'username',
        'email',
        'password'
    ];
    
    public $timestamps = false; // jika tidak punya created_at / updated_at
}
