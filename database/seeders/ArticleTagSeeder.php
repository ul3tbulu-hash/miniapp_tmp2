<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleTag;
use App\Models\Article;

class ArticleTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['adat', 'budaya', 'aceh', 'peusijuek', 'tradisi'];
        $articles = Article::all();

        foreach ($articles as $article) {
            $randomTags = collect($tags)->random(rand(1, 3));
            foreach ($randomTags as $tag) {
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag' => $tag,
                ]);
            }
        }
    }
}
