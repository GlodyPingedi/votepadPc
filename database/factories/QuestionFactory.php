<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "question"=> $this->faker->words(5, true),
            "ponderation"=>(int)$this->faker->numberBetween(5,10),
            "statut"=>"valide",
            "phase_id"=>(int)$this->faker->numberBetween(1,15)
        ];
    }
}