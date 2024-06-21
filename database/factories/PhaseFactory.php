<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phase>
 */
class PhaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=> $this->faker->words(3, true),
            "description"=> $this->faker->words(3, true),
            "slug" => $this->faker->unique()->regexify('[A-Z0-9]{3}'),
            "statut"=> $this->faker->randomElement(["active","desactive"]),
            "type"=> $this->faker->randomElement(["vote","evaluation"]),
            "date_debut"=> $this->faker->dateTimeBetween($startDate = 'now', $endDate = '1 year', $timezone = null),
            "date_fin"=> $this->faker->dateTimeBetween($startDate = 'now', $endDate = '1 year', $timezone = null),
            "evenement_id"=> $this->faker->numberBetween(1,5),
        ];
    }
}
