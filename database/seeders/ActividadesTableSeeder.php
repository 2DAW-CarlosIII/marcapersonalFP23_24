<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Actividad::truncate();

        foreach( self::$arrayActividades as $actividad ) {
            $act = new Actividad;
            $act->nombre = $actividad['nombre'];
            $act->docente_id = $actividad['docente_id'];
            $act->insignia = $actividad['insignia'];
            $act->save();
        }
    }

    private static $arrayActividades = [
        [
            'nombre' => 'Premio a la excelencia en F.P',
            'docente_id' => 1,
            'insignia' => 'https://marcapersonalFP.es/badge?v=u54uern',
        ],
        [
            'nombre' => 'F-P Sin Barreras',
            'docente_id' => 2,
            'insignia' => 'https://marcapersonalFP.es/badge?v=v87dfg2',
        ],
        [
            'nombre' => 'Empresarias que marcan la diferencia',
            'docente_id' => 3,
            'insignia' => 'https://marcapersonalFP.es/badge?v=frt32qe',
        ],
        [
            'nombre' => 'Visita a las instalaciones de Pramac',
            'docente_id' => 4,
            'insignia' => 'https://marcapersonalFP.es/badge?v=wtrh2we',
        ],
        [
            'nombre' => 'Realidad Virtual en Prevención de Riesgos Laborales',
            'docente_id' => 5,
            'insignia' => 'https://marcapersonalFP.es/badge?v=qwer123',
        ],
        [
            'nombre' => 'Innova y Emprende FEST',
            'docente_id' => 6,
            'insignia' => 'https://marcapersonalFP.es/badge?v=ytgfd32',
        ],
        [
            'nombre' => 'Escape Room Financiero',
            'docente_id' => 7,
            'insignia' => 'https://marcapersonalFP.es/badge?v=zxvbn23',
        ],
        [
            'nombre' => 'Pruebas Libres a Ciclos Formativos',
            'docente_id' => 8,
            'insignia' => 'https://marcapersonalFP.es/badge?v=asdf456',
        ],
        [
            'nombre' => 'Aula de Emprendimiento',
            'docente_id' => 9,
            'insignia' => 'https://marcapersonalFP.es/badge?v=qwerty78',
        ],
        [
            'nombre' => 'C3Runner',
            'docente_id' => 10,
            'insignia' => 'https://marcapersonalFP.es/badge?v=mnbvc90',
        ],
    ];
}
