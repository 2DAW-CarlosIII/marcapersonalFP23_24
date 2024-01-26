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
        ],
        [
            'user_id' => 2,
            'video_curriculum' => 'fabDpTOfKns',
        ],
        [
            'user_id' => 3,
            'video_curriculum' => '2in5XMTlSWg',
        ],
        [
            'user_id' => 4,
            'video_curriculum' => 'Sn-Za-l--e0',
        ],
        [
            'user_id' => 5,
            'video_curriculum' => 'T72HF3a2xL4',
        ],
        [
            'user_id' => 6,
            'video_curriculum' => 'uTgscfzdbCc',
        ],
        [
            'user_id' => 7,
            'video_curriculum' => 'bIPgAncy3Q0',
        ],
        [
            'user_id' => 8,
            'video_curriculum' => 'DCHp1F13R8k',
        ],
        [
            'user_id' => 9,
            'video_curriculum' => 'nL7dnv_egaI',
        ],
        [
            'user_id' => 10,
            'video_curriculum' => 'AKLJxNRrvjc',
        ],
    ];

    private static $frases = [
        "Publicación de tesis sobre innovaciones en FinTech en la Revista Internacional de Finanzas.",
        "Proyecto de tesis centrado en el desarrollo de algoritmos éticos para IA.",
        "Ganador del premio nacional de marketing digital por campaña innovadora en redes sociales.",
        "Colaborador en proyecto de investigación sobre optimización de redes 5G.",
        "Desarrolló un programa de enseñanza en línea para estudiantes con necesidades especiales.",
        "Investigación sobre nuevas técnicas de secuenciación de ADN presentada en congreso internacional.",
        "Diseño de un proyecto de vivienda ecológica premiado en concurso de arquitectura sostenible.",
        "Participación en conferencias internacionales sobre resolución de conflictos y diplomacia.",
        "Realización de un estudio comparativo sobre terapias de ansiedad para publicación en revista científica.",
        "Organizador de un simposio sobre tecnologías emergentes en la comunicación digital.",
        "Voluntariado en proyectos de educación ambiental y conservación de la biodiversidad.",
        "Desarrollo de un software educativo interactivo para el aprendizaje de lenguas extranjeras.",
        "Coordinación de un taller interdisciplinario sobre urbanismo y desarrollo sostenible.",
        "Investigación sobre el impacto de las redes sociales en la salud mental de adolescentes.",
        "Colaborador en proyecto de ley sobre derechos digitales y privacidad en la era de la información."
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curriculo::truncate();

        foreach (self::$arrayCurriculos as $curriculo) {
            $curri = new Curriculo;
            $curri->user_id = $curriculo['user_id'];
            $curri->video_curriculum = $curriculo['video_curriculum'];
            $curri->sobre_mi = self::$frases[array_rand(self::$frases)];
            $curri->save();
        }
    }
}
