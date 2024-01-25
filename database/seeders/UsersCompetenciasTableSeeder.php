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

        //Vamos a asignarle a todos los usuarios 0,1 o 2 competencias aleatorias
        $competencias = Competencia::all();
        $users = User::all();

        foreach ($users as $user) {
            //numero de registros a insertar (competencias)
            $numRegistros = rand(0, 2);

            for ($i=0; $i < $numRegistros; $i++) {
                $user->competencias()->attach($competencias->random()->id);
            }
        }



    }
}
