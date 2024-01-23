<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_CompetenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_competencias')->truncate();

        foreach( self::$arrayUsers_Competencias as $user_competencia ) {
            DB::table('users_competencias')->insert([
                'user_id' => $user_competencia['user_id'],
                'competencia_id' => $user_competencia['competencia_id'],
                'docente_validador' => $user_competencia['docente_validador'],
            ]);
        }
    }

    private static $arrayUsers_Competencias = array(
        array('user_id' => '1','competencia_id' => '2','docente_validador' => '10'),
        array('user_id' => '2','competencia_id' => '1','docente_validador' => '11'),
        array('user_id' => '3','competencia_id' => '3','docente_validador' => null),
    );
}
