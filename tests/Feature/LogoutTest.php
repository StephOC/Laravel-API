<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testUserIsLoggedOutProperly() 
    {
        $user = User::factory()->create([
            'email' => 'user@test.com'
        ]);

        $token = $user->generateToken();
        $headers = ['Authorization', "Bear $token"];

        $this->json('get', 'api/articles', [], $headers)->assertStatus(200);
        $this->json('post', 'api/logout', [], $headers)->assertStatus(200);
    }

    public function testUserWithNullToken()
    {
        // Simulating login
        $user = User::factory()->create([
            'email' => 'user@test.com'
        ]);

        $token = $user->generateToken();
        $headers = ['Authorization', "Bear $token"
        ];

        // Simulating logout
        $user->api_token = null;
        $user->save();

        $this->json('get', '/api/articles', [], $headers)->assertStatus(401);
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
