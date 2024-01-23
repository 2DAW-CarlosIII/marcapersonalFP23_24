<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParticipanteProyecto>
 */
class ParticipanteProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estudiante_id' => fake()->numberBetween($min = 1, $max = 50),
            'proyecto_id' => fake()->numberBetween($min = 1, $max = 50),
        ];
    }
}
