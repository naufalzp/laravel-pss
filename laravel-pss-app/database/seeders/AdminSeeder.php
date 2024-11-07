<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'username' => 'zhafif',
                'password' => bcrypt('password'),
                'email' => 'zhafif@mail.com'
            ],
            [
                'username' => 'aurel',
                'password' => bcrypt('password'),
                'email' => 'aurel@mail.com'
            ],
            [
                'username' => 'nabil',
                'password' => bcrypt('password'),
                'email' => 'nabil@mail.com'
            ]
        ];

        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}
