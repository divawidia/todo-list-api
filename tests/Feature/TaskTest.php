<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_all_task_of_a_todo_list()
    {
        //preparation
        $list = $this->createTodoList();
        $task = $this->createTask();

        //action
        $response = $this->getJson(route('todo-list.task.index', $list->id))->assertOk()->json();

        //assertion
        $this->assertEquals(1, $this->count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }

    public function test_store_task_for_todolist()
    {
        //preparation
        $list = $this->createTodoList();
        $task = Task::factory()->make();

        //action
        $response = $this->postJson(route('todo-list.task.store', $list->id), ['title' => $task->title])
            ->assertCreated()
            ->json();

        //assertion
        $this->assertEquals($task->title, $response['title']);
        $this->assertDatabaseHas('tasks', ['title'=>$task->title]);
    }

    public function test_delete_task()
    {
        //preparation
        $task = $this->createTask();

        //action
        $this->deleteJson(route('task.destroy', $task->id))->assertNoContent();
        $this->assertDatabaseMissing('tasks', ['title'=>$task->title]);
    }
}
