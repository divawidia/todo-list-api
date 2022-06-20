<?php

namespace Tests\Feature;

use App\Models\TodoList;
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

    use RefreshDatabase;

    public function test_fetch_all_todolist()
    {
        //preparation
        TodoList::factory()->create();
        //action
        $response = $this->getJson(route('todo-list.store'));

        //assertion
        $this->assertEquals(1, $this->count($response->json()));
    }

    public function test_fetch_single_todolist()
    {
        //preparation
        $list = TodoList::factory()->create();

        //action
        $response = $this->getJson(route('todo-list.show', $list->id))
                    ->assertOk()
                    ->json();

        //assertion
        $this->assertEquals($response['name'], $list->name);
    }
}
