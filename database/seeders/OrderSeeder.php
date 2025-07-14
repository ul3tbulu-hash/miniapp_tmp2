<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\CraftsmanProfile;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $craftsmen = CraftsmanProfile::all();
        $statusOptions = ['pending', 'processed', 'delivered', 'cancelled'];

        foreach (range(1, 10) as $i) {
            Order::create([
                'product_id' => $products->random()->id,
                'craftsman_profile_id' => $craftsmen->random()->id,
                'customer_name' => 'Customer ' . $i,
                'customer_email' => 'customer' . $i . '@mail.com',
                'customer_phone' => '0812345678' . $i,
                'customer_address' => 'Alamat Pelanggan ' . $i,
                'status' => $statusOptions[array_rand($statusOptions)],
                'total_price' => rand(60, 200),
                'payment_method' => 'transfer',
                'note' => 'Catatan untuk order ' . $i,
            ]);
        }
    }
}
