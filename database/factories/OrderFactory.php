<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\App\Models\CraftsmanProfile;
use App\Models\App\Models\Product;
use App\Models\Order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => App\Models\Product::factory(),
            'craftsman_profile_id' => App\Models\CraftsmanProfile::factory(),
            'customer_name' => fake()->word(),
            'customer_email' => fake()->word(),
            'customer_phone' => fake()->word(),
            'customer_address' => fake()->text(),
            'status' => fake()->word(),
            'total_price' => fake()->word(),
            'payment_method' => fake()->word(),
            'note' => fake()->text(),
        ];
    }
}
