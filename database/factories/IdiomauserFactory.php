<?php

namespace Database\Factories;

use App\Models\Idioma;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idiomauser>
 */
class IdiomauserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idioma_id' => Idioma::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'certificado' => fake()->boolean(),
        ];
    }
}
