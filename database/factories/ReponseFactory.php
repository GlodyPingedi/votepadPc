<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reponse>
 */
class ReponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "cote"=> $this->faker->numberBetween(1,15),
            "question_id"=> $this->faker->numberBetween(1,120),
            "candidat_id"=> $this->faker->numberBetween(1,100),
        ];
    }
}
