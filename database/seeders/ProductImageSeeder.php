<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;
use App\Models\Product;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            foreach (range(1, 3) as $i) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => "https://via.placeholder.com/600x400?text=Image+$i",
                    'is_primary' => $i === 1, // hanya image pertama yang primary
                ]);
            }
        }
    }
}
