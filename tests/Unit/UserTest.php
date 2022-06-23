<?php

namespace Tests\Unit;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_user_has_many_todolists()
    {
        $user = $this->createUser();
        $this->createTodoList(['user_id' => $user->id]);

        $this->assertInstanceOf(TodoList::class, $user->todo_lists->first());
    }
}
