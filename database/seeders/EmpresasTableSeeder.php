<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        \App\Models\Empresa::truncate();
        //bucle que crea 10 empresas con valores aleatorios
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Empresa::create([
                'nif' => $faker->unique()->randomNumber(9),
                'email' => $faker->unique()->safeEmail,
                'token' => $faker->unique()->randomNumber(9),
            ]);
        }



    }
}
