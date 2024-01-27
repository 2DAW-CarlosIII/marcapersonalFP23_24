<?php

namespace Database\Seeders;

use App\Models\Curriculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculosTableSeeder extends Seeder
{
    private static $arrayCurriculos = [
        [
            'user_id' => 1,
            'video_curriculum' => 'Ds8lRXWfoPE',
            'sobre_mi' => 'Explorador(a) incansable de la vida, buscando significado en cada experiencia.',
        ],
        [
            'user_id' => 2,
            'video_curriculum' => 'fabDpTOfKns',
            'sobre_mi' => 'Amante de los pequeños detalles que hacen la vida extraordinaria.',
        ],
        [
            'user_id' => 3,
            'video_curriculum' => '2in5XMTlSWg',
            'sobre_mi' => 'En constante evolución, aprendiendo y creciendo con cada desafío.',
        ],
        [
            'user_id' => 4,
            'video_curriculum' => 'Sn-Za-l--e0',
            'sobre_mi' => 'Soñador(a) apasionado(a) con metas grandes y el corazón lleno de determinación.',
        ],
        [
            'user_id' => 5,
            'video_curriculum' => 'T72HF3a2xL4',
            'sobre_mi' => 'Viajero(a) del mundo y coleccionista de momentos inolvidables.',
        ],
        [
            'user_id' => 6,
            'video_curriculum' => 'uTgscfzdbCc',
            'sobre_mi' => 'Defensor(a) de la positividad y la gratitud en todas las circunstancias.',
        ],
        [
            'user_id' => 7,
            'video_curriculum' => 'bIPgAncy3Q0',
            'sobre_mi' => 'Creativo(a) en constante búsqueda de nuevas formas de expresión y autodescubrimiento.',
        ],
        [
            'user_id' => 8,
            'video_curriculum' => 'DCHp1F13R8k',
            'sobre_mi' => 'Aprendiz perpetuo(a) del arte de vivir con propósito y autenticidad.',
        ],
        [
            'user_id' => 9,
            'video_curriculum' => 'nL7dnv_egaI',
            'sobre_mi' => 'Conquistador(a) de desafíos, siempre listo(a) para superar cualquier obstáculo.',
        ],
        [
            'user_id' => 10,
            'video_curriculum' => 'AKLJxNRrvjc',
            'sobre_mi' => 'Embajador(a) de la empatía y la conexión humana, creyendo en la belleza de cada historia.'
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curriculo::truncate();

        foreach( self::$arrayCurriculos as $curriculo ) {
            $curri = new Curriculo;
            $curri->user_id = $curriculo['user_id'];
            $curri->video_curriculum = $curriculo['video_curriculum'];
            $curri->sobre_mi = $curriculo['sobre_mi'];
            $curri->save();
        }
    }
}
