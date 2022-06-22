<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_todolist_can_has_many()
    {
        $list = $this->createTodoList();
        $task = $this->createTask(['todo_list_id' => $list->id]);

        $this->assertInstanceOf(Collection::class, $list->tasks->first());
        $this->assertInstanceOf(Task::class, $list->tasks->first());
    }
}
