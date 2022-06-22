<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_login()
    {
        $response = $this->postJson(route('user.login'),[
            'email' => 'user@gmail.com',
            'password'=> 'user123'
        ])->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }
}
