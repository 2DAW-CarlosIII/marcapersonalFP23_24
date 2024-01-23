<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto_Ciclo>
 */
class Proyecto_CicloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'proyecto_id' => fake()->numberBetween(1, 20),
            'ciclo_id' => fake()->numberBetween(1, 20),
        ];
    }
}
