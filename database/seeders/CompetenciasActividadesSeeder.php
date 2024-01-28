<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Competencia;
use App\Models\Competencias_Actividades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciasActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencias_Actividades::truncate();

        $actividades = Actividad::all();
        $competencias = Competencia::all();

        $actividades->each(function ($actividad) use ($competencias) {
            $numRelaciones = rand(0, 2);
            $relacionadas = $competencias->random($numRelaciones)->pluck('id')->toArray();

            $actividad->competencias()->attach($relacionadas);
        });
    }
}
