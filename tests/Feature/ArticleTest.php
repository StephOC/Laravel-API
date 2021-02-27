<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testsArticlesAreCreatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = Article::factory()->create([
            'title' => 'First Article',
            'body' => 'First body',
        ]);

        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum'
        ];

        $repsonse = $this->json('PUT',  '/api/articles/' . $article->id, [], $headers)
            ->assertStatus(204);
        
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
