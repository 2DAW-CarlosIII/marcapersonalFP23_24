<?php

namespace Database\Seeders;

use App\Models\User_Competencia;
use Illuminate\Database\Seeder;

class Users_CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User_Competencia::truncate();

        foreach(self::$arrayUsersCompetencias as $userCompetencia){

            $userCompen = new User_Competencia();
            $userCompen->user_id = $userCompetencia['user_id'];
            $userCompen->competencia_id = $userCompetencia['competencia_id'];
            $userCompen->docente_validador = $userCompetencia['docente_validador'];
            $userCompen->save();

        }

    }

    private static $arrayUsersCompetencias = [
        [
            'user_id' => 1,
            'competencia_id' => 2,
            'docente_validador' => 3,
        ],
        [
            'user_id' => 4,
            'competencia_id' => 3,
            'docente_validador' => 6,
        ],
    ];
}
