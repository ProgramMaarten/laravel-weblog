<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Maak 20 artikelen
        $articles = Article::factory(20)->create();

        // Zorg dat er categorieën aanwezig zijn
        $categories = Category::all();

        // Voor elk artikel, koppel 1 t/m 3 willekeurige categorieën
        $articles->each(function($article) use ($categories) {
            $article->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
