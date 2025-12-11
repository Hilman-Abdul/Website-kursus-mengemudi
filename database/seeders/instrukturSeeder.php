<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstrukturSeeder extends Seeder
{
    public function run(): void
    {
        $instrukturs = [

            // 4 Laki-laki Matic
            [
                'nama' => 'Budi Santoso',
                'no_hp' => '081234567001',
                'keahlian' => 'matic',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama' => 'Andi Pratama',
                'no_hp' => '081234567002',
                'keahlian' => 'matic',
                'jenis_kelamin' => 'Laki-laki'
            ],

            // 4 Laki-laki Manual
            [
                'nama' => 'Alief Haryanto',
                'no_hp' => '081234567005',
                'keahlian' => 'manual',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'nama' => 'Fajar Rahman',
                'no_hp' => '081234567006',
                'keahlian' => 'manual',
                'jenis_kelamin' => 'Laki-laki'
            ],

            // 4 Perempuan Matic
            [
                'nama' => 'Siti Maesaroh',
                'no_hp' => '081234567009',
                'keahlian' => 'matic',
                'jenis_kelamin' => 'Perempuan'
            ],
            [
                'nama' => 'Nadia Putri',
                'no_hp' => '081234567010',
                'keahlian' => 'matic',
                'jenis_kelamin' => 'Perempuan'
            ],

            // 4 Perempuan Manual
            [
                'nama' => 'Dewi Ramadhani',
                'no_hp' => '081234567013',
                'keahlian' => 'manual',
                'jenis_kelamin' => 'Perempuan'
            ],
            [
                'nama' => 'Ratna Sari',
                'no_hp' => '081234567014',
                'keahlian' => 'manual',
                'jenis_kelamin' => 'Perempuan'
            ],
        ];

        DB::table('instrukturs')->insert($instrukturs);
    }
}
