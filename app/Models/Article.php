<?php
/**
 * Article.php
 * php version 8.1.2
 *
 * @category Model
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Article model
 *
 * @category Test
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class Article extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'image',
        'link',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'title'       => 'string',
        'body'        => 'string',
        'image'       => 'string',
        'link'        => 'string',
    ];
}
