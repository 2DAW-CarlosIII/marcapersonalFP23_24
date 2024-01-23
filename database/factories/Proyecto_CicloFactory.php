<?php

namespace Database\Factories;

use App\Models\Ciclo;
use App\Models\Proyecto;
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
            'proyecto_id' => Proyecto::all()->random()->id,
            'ciclo_id' => Ciclo::all()->random()->id,
        ];
    }
}
