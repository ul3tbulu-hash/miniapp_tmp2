<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\App\Models\User;
use App\Models\CraftsmanProfile;

class CraftsmanProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CraftsmanProfile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => App\Models\User::factory(),
            'bio' => fake()->text(),
            'location' => fake()->word(),
            'photo' => fake()->regexify('[A-Za-z0-9]{nullable}'),
            'is_approved' => fake()->boolean(),
        ];
    }
}
