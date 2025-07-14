<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $titles = ['Apa Itu Peusijuek?', 'Sejarah Peusijuek', 'Kenapa Harus Dipeusijuek?'];

        foreach ($titles as $title) {
            Article::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'excerpt' => 'Lorem ipsum dolor sit amet...',
                'content' => '<p>Lorem ipsum dolor sit amet...</p>',
                'featured_image' => 'https://via.placeholder.com/800x400',
                'is_published' => true,
                'user_id' => 1, // diasumsikan Admin Aceh
            ]);
        }
    }
}
