<?php

namespace Database\Factories;

use App\Models\Actividad;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reconocimiento>
 */
class ReconocimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // estudiante_id es un user cuyo dominio es alu.murciaeduca.es
            'estudiante_id' => User::where('email', 'LIKE', '%@alu.murciaeduca.es')->pluck('id')->random(),
            'actividad_id' => $this->faker->numberBetween(2, 10),
            'documento' => $this->faker->word,
            // docente_validador_id es un el docente_id cd actividad
            'docente_validador_id' => User::where('email', 'LIKE', '%@murciaeduca.es')->pluck('id')->random(),

            'fecha' => $this->faker->date,

        ];
    }
}
