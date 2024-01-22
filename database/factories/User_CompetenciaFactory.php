<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_Competencia>
 */
class User_CompetenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => DB::table('users')->inRandomOrder()->first()->id,
            'competencia_id' => DB::table('competencias')->inRandomOrder()->first()->id,
            'docente_validador' => DB::table('users')->inRandomOrder()->first()->id,
        ];
    }
}
