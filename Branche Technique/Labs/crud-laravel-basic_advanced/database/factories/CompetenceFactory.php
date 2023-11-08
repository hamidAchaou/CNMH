<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Competence;

class CompetenceFactory extends Factory
{
    protected $model = Competence::class;

    public function definition()
    {
        return [
            // 'Reference' => $this->faker->word,
            'Reference' => $this->faker->unique()->word,
            'Code' => $this->faker->randomNumber(4),  
            'Name' => $this->faker->word, 
            'Description' => $this->faker->sentence, 
        ];
    }
}
