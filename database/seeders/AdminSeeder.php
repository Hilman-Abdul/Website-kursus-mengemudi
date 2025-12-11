<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admins = [
            [
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => '20082009',
            ],
            [
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => '20092010',
            ],
            [
                'username' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => '20102011',
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
