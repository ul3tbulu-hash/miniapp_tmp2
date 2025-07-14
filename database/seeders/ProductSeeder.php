<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'title' => 'Paket Peusijuek Sederhana',
                'slug' => 'paket-peusijuek-sederhana',
                'description' => '<p>Paket lengkap alat peusijuek untuk acara sederhana.</p>',
                'excerpt' => 'Paket dasar peusijuek',
                'price' => 50000,
                'image' => 'https://via.placeholder.com/600x400?text=Peusijuek+Sederhana',
                'is_published' => true,
                'category_id' => 1,
                'user_id' => 2,
            ],
            [
                'title' => 'Paket Sirih Tradisional',
                'slug' => 'paket-sirih-tradisional',
                'description' => '<p>Wadah sirih lengkap dengan daun dan buah-buahan khas Aceh.</p>',
                'excerpt' => 'Sirih tradisional Aceh',
                'price' => 30000,
                'image' => ' https://via.placeholder.com/600x400?text=Sirih+Tradisional',
                'is_published' => true,
                'category_id' => 2,
                'user_id' => 3,
            ],
            [
                'title' => 'Rencong Miniatur',
                'slug' => 'rencong-miniatur',
                'description' => '<p>Keris mini dari Aceh, simbol kebanggaan budaya Aceh.</p>',
                'excerpt' => 'Miniatur rencong',
                'price' => 75000,
                'image' => ' https://via.placeholder.com/600x400?text=Rencong+Mini',
                'is_published' => true,
                'category_id' => 4,
                'user_id' => 4,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}