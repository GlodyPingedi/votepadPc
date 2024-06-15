<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Critere>
 */
class CritereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle'=>$this->faker->numerify('Critère ##'),
            'description'=>$this->faker->unique()->sentence(),
            'ponderation'=>$this->faker->numberBetween(1,10),
        ];
    }
}
