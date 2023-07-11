<?php

namespace Database\Seeders;

use App\Providers\SeedService;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents('articles.json');
        $articles = json_decode($json, true);
        foreach ($articles as $article) {
            SeedService::createArticle($article);
        }
    }
}
