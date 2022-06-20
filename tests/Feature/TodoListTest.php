<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use voku\helper\ASCII;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private $list;

    public function setUp():void
    {
        parent::setUp();
        $this->list = TodoList::factory()->create();
    }

    public function test_fetch_all_todolist()
    {
        //action
        $response = $this->getJson(route('todo-list.store'));

        //assertion
        $this->assertEquals(1, $this->count($response->json()));
    }

    public function test_fetch_single_todolist()
    {
        //action
        $response = $this->getJson(route('todo-list.show', $this->list->id))
                    ->assertOk()
                    ->json();

        //assertion
        $this->assertEquals($response['name'], $this->list->name);
    }
}
