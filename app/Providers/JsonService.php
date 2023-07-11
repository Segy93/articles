<?php

/**
 * JsonService.php
 * php version 8.1.2
 *
 * @category Controller
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
namespace App\Providers;

use Illuminate\Http\JsonResponse;

/**
 * Service for json responses
 *
 * @category Service
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class JsonService
{

    /**
     * Sends json response
     *
     * @param mixed   $data Data or error message
     * @param integer $code Http code
     *
     * @return JsonResponse
     */
    public static function sendResponse(mixed $data, int $code): JsonResponse
    {
        return response()->json($data, $code);
    }
}
