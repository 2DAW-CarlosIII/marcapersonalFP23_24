<?php

namespace Database\Factories;

use App\Models\Competencia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class User_competenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'competencia_id' => Competencia::pluck('id')->random(),
            'docente_validador' => User::pluck('id')->random(),
        ];
    }
}
