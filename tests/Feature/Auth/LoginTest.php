<?php

namespace Tests\Feature\Auth;

use App\Models\User;
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
    use RefreshDatabase;

    public function test_user_can_login()
    {
        $user = $this->createUser();

        $response = $this->postJson(route('user.login'),[
            'email' => $user->email,
            'password'=> 'password'
        ])->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_return_error_if_user_email_not_available()
    {
        $response = $this->postJson(route('user.login'),[
            'email' => 'user@gmail.com',
            'password'=> 'user123'
        ])->assertUnauthorized();
    }

    public function test_raise_error_if_password_is_incorrect()
    {
        $user = $this->createUser();

        $response = $this->postJson(route('user.login'),[
            'email' => $user->email,
            'password'=> 'random'
        ])->assertUnauthorized();
    }
}
