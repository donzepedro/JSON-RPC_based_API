<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => now(),
            'status'=> array_rand(['new'=>'new','done'=>'done'],1),
            'text' => Str::random(100),
        ];
    }
}
