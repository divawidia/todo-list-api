<?php

namespace Database\Factories;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = TodoList::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'user_id' => function(){
                return User::factory()->create()->id;
            }
        ];
    }
}
