<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competencia>
 */
class CompetenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->randomElement(['enseñar', 'liderar', 'resolutivo', 'tranquilo']),
            'color'=>fake()->colorName(),
        ];
    }
}
