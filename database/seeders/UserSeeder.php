<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Aceh',
            'email' => 'admin@peusijuek.com',
            'password' => Hash::make('bismillah'),
            'role' => 'admin',
            'is_verified' => true,
        ]);

        // Pengrajin
        $pengrajinNames = ['Hasan', 'Amin', 'Surya', 'Fadli', 'Zaini'];
        foreach ($pengrajinNames as $name) {
            User::create([
                'name' => "$name Pengrajin",
                'email' => strtolower(str_replace(' ', '', "$name@peusijuek.com")),
                'password' => Hash::make('bismillah'),
                'role' => 'pengrajin',
                'is_verified' => true,
            ]);
        }

        // Jika kamu mau tambah beberapa user pengunjung (opsional)
        User::factory(10)->create();
    }
}