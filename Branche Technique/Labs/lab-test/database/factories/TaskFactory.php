<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'description' => fake()->sentence(),
            'projetId' =>$this->faker->numberBetween(1, 3),
        ];
    }
}
