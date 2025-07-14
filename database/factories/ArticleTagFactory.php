<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\App\Models\Article;
use App\Models\ArticleTag;

class ArticleTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'article_id' => App\Models\Article::factory(),
            'tag' => fake()->word(),
        ];
    }
}
