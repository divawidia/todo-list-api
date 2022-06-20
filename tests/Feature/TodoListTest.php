<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_todolist()
    {
        //preparation

        //action
        $response = $this->getJson(route('todo-list.store'));

        //assertion
        $this->assertEquals(1, $this->count($response->json()));
    }
}
