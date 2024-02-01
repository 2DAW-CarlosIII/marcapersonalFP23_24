<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competencia;
use App\Models\Actividad;
use App\Models\Competencias_Actividades;

class ActividadesCompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencias_Actividades::truncate();

        $actividades = Actividad::all();
        $competencias = Competencia::all();

        foreach ($actividades as $actividad) {
            $nCompetencias = rand(0, 2);

            for ($i = 0; $i < $nCompetencias; $i++) {
                $competenciaAleatoria = $competencias->random();
                $actividad->competencias()->attach($competenciaAleatoria->id);
            }
        }
    }
}
