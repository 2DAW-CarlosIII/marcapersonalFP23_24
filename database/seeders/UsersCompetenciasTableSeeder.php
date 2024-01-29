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
       
        UserCompetencia::factory(5)->create();

        $usuarios = User::all();
        $competencias = Competencia::all();

        foreach ($usuarios as $usuario) {
            $numCompetenciasUsuario = random_int(0, 2);

            for ($i = 0; $i < $numCompetenciasUsuario; $i++){
                $competencia = $competencias->random();
                $usuario->competencias()->attach($competencia->id);
            }
        }
    }
}
