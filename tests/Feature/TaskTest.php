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
        $task = Task::factory()->create();

        //action
        $response = $this->getJson(route('task.index'))->assertOk()->json();

        //assertion
        $this->assertEquals(1, $this->count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }

    public function test_store_task_for_todolist()
    {
        //preparation
        $task = Task::factory()->make();

        //action
        $response = $this->postJson(route('task.store'), ['title' => $task->title])
            ->assertCreated()
            ->json();

        //assertion
        $this->assertEquals($task->title, $response['title']);
        $this->assertDatabaseHas('tasks', ['title'=>$task->title]);
    }
}
