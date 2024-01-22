<?php

namespace Database\Seeders;

use App\Models\Competencia;
use App\Models\User;
use App\Models\UserCompetencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_competenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_competencias')->truncate();
        //Users_competencias es una tabla N:M de users y competencias

        $users = User::all();
        $competencias = Competencia::all();
        $docentes = User::all();

        //Para cada usuario asignamos algunas competencias aleatorias
        foreach ($users as $user) {
            //Obtenemos un subconjunto aleatorio de competencias
            $subset = $competencias->random(rand(1, 3));

            foreach ($subset as $competencia) {
                DB::table('users_competencias')->insert([
                    'user_id' => $user->id,
                    'competencia_id' => $competencia->id,
                    'docente_validador' => $docentes->random()->id,
                ]);
                /*UserCompetencia::create([
                    'user_id' => $user->id,
                    'competencia_id' => $competencia->id,
                    'docente_validador' => $docentes->random()->id,
                ]);*/
            }
        }

    }
}
