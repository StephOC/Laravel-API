<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testRequireEmailAndLogin() 
    {
        $this->json('POST', 'api/login')
        ->assertStatus(422)
        ->assertJson([
            'email' => ['The email fiield is required.'],
            'password' => ['The password filed is requred']
        ]);
    }

    public function testUserLoginsSuccessfully()
    {
        $user = User::factory()->create([
            'email' => 'stephen.oconnor@kaxmedia.com',
            'password' => bcrypt('12345678')
        ]);

        $payload = ['email' => 'stephen.oconnor@kaxmedia.com', 'password' => '12345678'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
