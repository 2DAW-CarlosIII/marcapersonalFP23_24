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
            'video_curriculum' => 'Sn-Za-l--e0',
            'texto_curriculum' => "Experiencia en desarrollo web con enfoque en tecnologías front-end.",
        ],
        [
            'user_id' => 2,
            'video_curriculum' => '2in5XMTlSWg',
            'texto_curriculum' => "Habilidades avanzadas en HTML, CSS y JavaScript.",
        ],
        [
            'user_id' => 3,
            'video_curriculum' => 'T72HF3a2xL4',
            'texto_curriculum' => "Amplia experiencia en el diseño y desarrollo de interfaces de usuario.",
        ],
        [
            'user_id' => 4,
            'video_curriculum' => 'fabDpTOfKns',
            'texto_curriculum' => "Conocimientos sólidos en frameworks front-end como React y Vue.",
        ],
        [
            'user_id' => 5,
            'video_curriculum' => 'Ds8lRXWfoPE',
            'texto_curriculum' => "Experiencia en integración de API y consumo de servicios web.",
        ],
        [
            'user_id' => 6,
            'video_curriculum' => 'Ds8lRXWfoPE',
            'texto_curriculum' => "Habilidades de resolución de problemas y pensamiento lógico.",
        ],
        [
            'user_id' => 7,
            'video_curriculum' => 'fabDpTOfKns',
            'texto_curriculum' => "Colaborador proactivo y eficiente en entornos de trabajo en equipo.",
        ],
        [
            'user_id' => 8,
            'video_curriculum' => 'T72HF3a2xL4',
            'texto_curriculum' => "Capacidad para aprender rápidamente nuevas tecnologías y conceptos.",
        ],
        [
            'user_id' => 9,
            'video_curriculum' => '2in5XMTlSWg',
            'texto_curriculum' => "Comprometido con la mejora continua y el desarrollo profesional.",
        ],
        [
            'user_id' => 10,
            'video_curriculum' => 'Sn-Za-l--e0',
            'texto_curriculum' => "Comunicación efectiva y habilidades interpersonales.",
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
            $curri->texto_curriculum = $curriculo['texto_curriculum'];
            $curri->save();
        }
    }
}
