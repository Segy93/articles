<?php
/**
 * ArticleSeeder.php
 * php version 8.1.2
 *
 * @category Seeder
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
namespace Database\Seeders;

use App\Providers\SeedService;
use Illuminate\Database\Seeder;

/**
 * Seeding for articles
 *
 * @category Seeder
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
