<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_all_task_of_a_todo_list()
    {
        //preparation
        $task = Task::factory()-create();

        //action
        $response = $this->getJson(route('task.index'))->assertOk()->json();

        //assertion
        $this->assertEquals(1, $this->count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }
}
