<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assertion>
 */
class AssertionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "assertion"=> $this->faker->words(5, true),
            "ponderation"=>(int)$this->faker->numberBetween(1,15),
            "statut"=>$this->faker->randomElement(['active','desactive']),
            "question_id"=>(int)$this->faker->numberBetween(1,120),
        ];
    }
}
