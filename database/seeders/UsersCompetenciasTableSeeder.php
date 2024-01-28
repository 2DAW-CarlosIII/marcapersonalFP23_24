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
        $usuarios = User::all();
        $competencias = Competencia::all();

        foreach ($usuarios as $usuario) {
            for ($i = 0; $i < random_int(0, 2); $i++){
                $competencia = $competencias->random();
                $usuario->competencias()->attach($competencia->id);
            }
        }
    }
}
