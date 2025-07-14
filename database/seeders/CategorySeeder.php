<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Peusijuek',
                'description' => 'Paket lengkap alat peusijuek tradisional',
                'is_active' => true,
            ],
            [
                'name' => 'Sirih',
                'description' => 'Produk sirih lengkap dengan wadah adat',
                'is_active' => true,
            ],
            [
                'name' => 'Resam',
                'description' => 'Barang-barang adat untuk upacara resam',
                'is_active' => true,
            ],
            [
                'name' => 'Rencong',
                'description' => 'Keris tradisional Aceh (rencong)',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}