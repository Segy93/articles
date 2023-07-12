<?php

/**
 * TicketTest.php
 * php version 8.1.2
 *
 * @category Test
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/kanban
 */
namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

/**
 * Tests for ArticleController methods
 *
 * @category Test
 * @package  Laravel
 * @author   Sergej Sjekloca <segy993@gmail.com>
 * @license  No license
 * @link     https://github.com/Segy93/articles
 */
class ArticleTest extends TestCase
{
    // CREATE

    /**
     * Test if article is created successfully
     *
     * @return void
     */
    public function testArticleIsCreatedSuccessfully(): void
    {
        $payload = [
            'title'        => fake()->realText(),
            'body'         => fake()->text(),
            'image'        => fake()->url(),
            'link'         => fake()->url(),
        ];
        $this->json('post', '/api/articles', $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(['message',]);
        unset($payload['password']);
        $this->assertDatabaseHas('articles', $payload);
    }

    /**
     * Tests if article create validation failed
     *
     * @return void
     */
    public function testArticleCreateValidationFailed(): void
    {
        $payload = [
            'title'        => Str::random(257),
            'body'         => Str::random(257),
            'image'        => Str::random(500),
            'link'         => Str::random(400),
        ];
        $this->json('post', '/api/articles', $payload)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['message', 'errors']);
    }

    // READ

    /**
     * Test of fetching all tickets successfully
     *
     * @return void
     */
    public function testIndexReturnsDataInValidFormat(): void
    {
        $this->json('get', '/api/articles')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'title',
                        'body',
                        'image',
                        'link',
                        'created_at',
                        'updated_at',
                    ]
                ]
            );
    }
}
