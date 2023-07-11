<?php
/**
 * ArticleController.php
 * php version 8.1.2
 *
 * @category Controller
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
namespace App\Http\Controllers;

use App\Models\Article;
use App\Providers\JsonService;
use App\Providers\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Crud methods for managing tickets
 *
 * @category Controller
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class ArticleController extends Controller
{
    // CREATE

    /**
     * Creating single ticket
     *
     * @param Request $request HTTP request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $ticket = new Article();

        $validated = ArticleService::validateData($request);
        ArticleService::create($validated);

        $data = ['message' => 'Article created'];
        return JsonService::sendResponse($data, Response::HTTP_CREATED);
    }









    // READ

    /**
     * Fetches all articles
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $articles = Article::all();

        return JsonService::sendResponse($articles, Response::HTTP_OK);
    }
}
