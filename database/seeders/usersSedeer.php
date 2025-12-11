<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Andi Saputra',
            'email' => 'andi@example.com',
            'password' => bcrypt('123456'),
            'no_hp' => '081234111222',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jakarta'
        ]);
    }
}
