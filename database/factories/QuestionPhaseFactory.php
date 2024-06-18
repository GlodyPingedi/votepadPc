<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionPhase>
 */
class QuestionPhaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "question_id"=> $this->faker->numberBetween(1,100),
            "phase_id"=> $this->faker->numberBetween(1,10),
            "ponderation"=> $this->faker->numberBetween(1,15),
        ];
    }
}
