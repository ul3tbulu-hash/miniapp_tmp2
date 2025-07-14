<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\App\Models\Category;
use App\Models\App\Models\User;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'excerpt' => fake()->word(),
            'price' => fake()->word(),
            'image' => fake()->regexify('[A-Za-z0-9]{nullable}'),
            'is_published' => fake()->boolean(),
            'category_id' => App\Models\Category::factory(),
            'user_id' => App\Models\User::factory(),
        ];
    }
}
