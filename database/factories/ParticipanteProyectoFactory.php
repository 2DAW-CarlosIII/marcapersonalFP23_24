<?php

namespace Database\Factories;

use App\Models\Proyecto;
use App\Models\User;
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
            'estudiante_id' => User::all()->random()->id,
            'proyecto_id' => Proyecto::all()->random()->id,
        ];
    }
}
