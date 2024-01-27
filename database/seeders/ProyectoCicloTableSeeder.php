<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\Ciclo;
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
        $ciclos = Ciclo::all();

        foreach ($proyectos as $proyecto) {

            $proyectoCiclo = rand(0, 2);

            for ($i = 0; $i < $proyectoCiclo; $i++) {
                $ciclo = $ciclos->random();
                $proyecto->ciclos()->attach($ciclo->id);
            }
        }
    }
}
