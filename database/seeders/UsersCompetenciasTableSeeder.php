<?php

namespace Database\Seeders;

use App\Models\Competencia;
use App\Models\User;
use App\Models\UserCompetencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCompetencia::truncate();

        $users = User::all();
        $competencias = Competencia::all();


        foreach ($users as $user) {
            $cantidadCompetencias = random_int(0, 2);

            $competenciasAsignadas = [];

            for ($i = 0; $i < $cantidadCompetencias; $i++) {
                $competenciaAsignada = $competencias->random();

                while (!in_array($competenciaAsignada->id, $competenciasAsignadas)) {
                    $user->competencias()->attach($competenciaAsignada->id);
                    $competenciasAsignadas[] = $competenciaAsignada->id;
                }
            }
        }


    }}
