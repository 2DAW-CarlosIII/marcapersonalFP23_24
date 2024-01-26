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

        $listaUsuarios = User::all();
        $listaCompetencias = Competencia::all();

        // A cada usuario se le tiene que asignar 0, 1 o 2 competencias

        foreach ($listaUsuarios as $usuario) {
            $numeroCompetenciasUsuario = random_int(0, 2);

            for ($i = 0; $i < $numeroCompetenciasUsuario; $i++){
                $competencia = $listaCompetencias->random();
                $usuario->competencias()->attach($competencia->id);
            }
        }

        // TODO No sé si habría que asociar también un docente validador, pero ahora mismo lo único que se podría hacer es escoger un user aleatorio
    }
}
