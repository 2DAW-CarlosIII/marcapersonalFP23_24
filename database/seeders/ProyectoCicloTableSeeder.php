<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\Proyecto;
use App\Models\ProyectoCiclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoCicloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProyectoCiclo::truncate();

        $proyectos = Proyecto::all();

        foreach ($proyectos as $proyecto) {
            $proyectoCiclo = rand(0, 2);

            $ciclosAleatorios = Ciclo::inRandomOrder()->take($proyectoCiclo)->get();

            foreach ($ciclosAleatorios as $ciclo) {
                $proyecto->ciclos()->attach($ciclo->id);
            }
        }
    }
}
