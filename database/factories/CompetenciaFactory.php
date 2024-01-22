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
            'nombre' => fake()->randomElement(['Worpress', 'Comunicación', 'Asertividad','Trabajo en equipo','Iniciativa','Liderazgo','Linux','Java']),
            'color'=>fake()->randomElement(['cyan','red','green','yellow','white','blue'])
        ];
    }
}
