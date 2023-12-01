<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

 
    public function definition(): array
    {
        return [
            "nom"=> $this->faker->word, 
            "description"=> $this->faker->sentence,          
        ];
    }
}
