<?php

namespace Database\Seeders;

use App\Models\Idiomas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Idiomas::truncate();

        foreach( self::$arrayIdiomas as $idioma ) {
            $recon = new Idiomas();
            $recon->estudiante_id = $idioma['estudiante_id'];
            $recon->nombre = $idioma['idiomas_id'];
            $recon->save();
        }
    }
    private static $arrayIdiomas = [
        [
            'estudiante_id' => 1,
            'nombre' => 'Ingles',
        ],

        [
            'estudiante_id' => 2,
            'nombre' => 'Frances',
        ],

        [
            'estudiante_id' => 3,
                'nombre' => 'Aleman',
         ],

        [
            'estudiante_id' => 4,
            'nombre' => 'Italiano',
        ],

        [
            'estudiante_id' => 5,
            'nombre' => 'Portugues',

        ],

        [
            'estudiante_id' => 6,
                'nombre' => 'Chino',
        ],

        [
            'estudiante_id' => 7,
                'nombre' => 'Japones',
        ],

        [
            'estudiante_id' => 8,
                'nombre' => 'Ruso',
        ],

        [
            'estudiante_id' => 9,
                'nombre' => 'Arabe',
        ],

        [
            'estudiante_id' => 10,
                'nombre' => 'Coreano',

        ],
    ];
}
