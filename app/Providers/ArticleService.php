<?php

/**
 * ArticleService.php
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
use Illuminate\Http\Request;

/**
 * Service for ticket history, and ticket validation
 *
 * @category Service
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class ArticleService
{
    // Validation

    /**
     * Data validation for articles
     *
     * @param Request $request HTTP request
     *
     * @return array
     */
    public static function validateData(Request $request): array
    {
        return $request->validate(
            [
                'title'        => 'required|string|min:3|max:255',
                'body'         => 'required|string|min:3',
                'image'        => 'required|string|url',
                'link'         => 'required|string|url',
            ]
        );
    }

    /**
     * Creates new article
     *
     * @param array $validated Validated article data
     *
     * @return void
     */
    public static function create(array $validated): void
    {
        $article = new Article();
        $article->title = $validated['title'];
        $article->body  = $validated['body'];
        $article->image = $validated['image'];
        $article->link  = $validated['link'];

        $article->save();
    }
}
