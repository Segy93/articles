<?php

/**
 * SeedService.php
 * php version 8.1.2
 *
 * @category Service
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
namespace App\Providers;

use App\Models\Article;

/**
 * Service for database seeding
 *
 * @category Service
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class SeedService
{
    // CREATE

    /**
     * Creates data
     *
     * @param array $data Article data(title, body, image, link)
     *
     * @return Article
     */
    public static function createArticle($data): Article
    {
        return Article::create($data);
    }
}
