<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IdiomasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'nombre' => fake()->randomElement(['Español', 'Inglés', 'Francés', 'Húngaro', 'Alemán', 'Italiano', 'Ruso', 'Japonés']),
            ];
    }
}
