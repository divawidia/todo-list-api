<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $this->postJson(route('user.register'),[
            'name' => 'Dipa',
            'email' => 'user@gmail.com',
            'password' => 'user123',
            'password_confirmation' => 'user123',
        ])->assertCreated();

        $this->assertDatabaseHas('users', ['name' => 'Dipa']);
    }
}
