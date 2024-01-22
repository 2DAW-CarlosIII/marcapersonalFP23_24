<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciasTableSeeder extends Seeder
{
    private static $arrayCompetencias = [
        [
            'nombre' => 'Comunicación oral',
            'color' => 'red',
        ],
        [
            'nombre' => 'Comunicación escrita',
            'color' => 'blue',
        ],
        [
            'nombre' => 'Comunicación audiovisual',
            'color' => 'green',
        ],
        [
            'nombre' => 'Comunicación digital',
            'color' => 'yellow',
        ],
        [
            'nombre' => 'Comunicación corporal',
            'color' => 'orange',
        ],
        [
            'nombre' => 'Comunicación emocional',
            'color' => 'purple',
        ],
        [
            'nombre' => 'Comunicación social',
            'color' => 'pink',
        ],
        [
            'nombre' => 'Comunicación intercultural',
            'color' => 'brown',
        ],
        [
            'nombre' => 'Comunicación científica',
            'color' => 'grey',
        ],
        [
            'nombre' => 'Comunicación artística',
            'color' => 'black',
        ],
    ];

    public function run(): void
    {
        Competencia::truncate();

        foreach( self::$arrayCompetencias as $competencia){
            $compe = new Competencia;
            $compe->nombre = $competencia['nombre'];
            $compe->color = $competencia['color'];
            $compe->save();
        }
    }
}
