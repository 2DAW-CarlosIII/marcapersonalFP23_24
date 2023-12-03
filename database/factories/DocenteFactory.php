<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class DocenteFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'direccion' => fake()->address(),
            'departamento' => fake()->randomElement([
                'Administración',
                'Comercio, Informática',
                'Relaciones con las empresas',
                'DIOP',
                'Innovación'
            ]),
        ];
    }
}
