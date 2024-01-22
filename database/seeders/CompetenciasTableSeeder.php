<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competencias')->truncate();

        foreach( self::$arrayCompetencias as $competencia ) {
            DB::table('competencias')->insert([
                'nombre' => $competencia['nombre'],
                'color' => $competencia['color'],
            ]);
        }
    }

    private static $arrayCompetencias = array(
        array('nombre' => 'Comunicacion Linguistica','color' => 'rojo'),
        array('nombre' => 'Matematica','color' => 'azul'),
        array('nombre' => 'Digital','color' => 'morado'),
    );

}
