<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IntervenantPhase>
 */
class IntervenantPhaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "phase_id"=>$this->faker->numberBetween(1,2), 
            "intervenant_id"=>$this->faker->unique()->numberBetween(1,6),
        ];
    }
}
