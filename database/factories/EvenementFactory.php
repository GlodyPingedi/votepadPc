<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->unique()->numerify('Evénement ##'),
            'description'=>$this->faker->unique()->sentence(),
            'type'=>$this->faker->randomElement(['Compétition', 'Evaluation']),
            'date_debut'=>$this->faker->unique()->dateTime($max = 'now'),
            'date_fin'=>$this->faker->unique()->dateTime($max = 'now'),
            'status'=>$this->faker->randomElement(['en cours','en attente','fermer']),
        ];
    }
}
