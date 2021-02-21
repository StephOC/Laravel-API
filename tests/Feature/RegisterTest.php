<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsRegisterSuccessfully()
    {
        $payload = [
            'name' => 'Stephen',
            'email' => 'stephen.connor@kaxmedia.com',
            'password' => '12345678',
            'passwrod_confirmation' => '12345678'
        ];
        
        $this->json('post', 'api/register', $payload)
            ->assertStatus(201)
            ->assertJson([
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

    public function testsRequiresPasswordEmailAndName() 
    {
        $this->json('post', 'api/register')
            ->assertStatus(422)
            ->assertJson([
                'name' => ['This filed is required'],
                'email' => ['This filed is required'],
                'password' => ['This filed is required']
            ]);
    }

    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'name' => 'Stephen',
            'email' => 'stephen.oconnor@kaxmedia.com',
            'password' => '12345678'
        ];

        $this->json('post', 'api/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'password' => ['The password filed does not match.']
            ]);
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
