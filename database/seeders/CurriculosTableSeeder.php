<?php

namespace Database\Seeders;

use App\Models\Curriculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculosTableSeeder extends Seeder
{
    private static $arrayCurriculos = [
        [
            'user_id' => 12,
            'video_curriculum' => 'fabDpTOfKns',
        ],
        [
            'user_id' => 13,
            'video_curriculum' => '2in5XMTlSWg',
        ],
        [
            'user_id' => 14,
            'video_curriculum' => 'Sn-Za-l--e0',
        ],
        [
            'user_id' => 15,
            'video_curriculum' => 'T72HF3a2xL4',
        ],
        [
            'user_id' => 16,
            'video_curriculum' => 'uTgscfzdbCc',
        ],
        [
            'user_id' => 17,
            'video_curriculum' => 'bIPgAncy3Q0',
        ],
        [
            'user_id' => 18,
            'video_curriculum' => 'DCHp1F13R8k',
        ],
        [
            'user_id' => 19,
            'video_curriculum' => 'nL7dnv_egaI',
        ],
        [
            'user_id' => 20,
            'video_curriculum' => 'AKLJxNRrvjc',
        ],
        [
            'user_id' => 21,
            'video_curriculum' => 'Ds8lRXWfoPE',
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
            $curri->sobre_mi = self::$frases_sobre_mi[rand(0, count(self::$frases_sobre_mi)-1)];
            $curri->save();
        }
    }

    private static $frases_sobre_mi = [
        'Me gusta trabajar en equipo',
        'Soy una persona responsable',
        'Me gusta aprender cosas nuevas',
        'Escucho a los demás',
        'Me gusta ayudar a los demás',
        'Soy una persona creativa',
        'Siempre que puedo echar una mano a mis compañeros lo hago',
        'Me considero una persona empática',
        'Trabajador, dedicado y responsable son mis rasgos principales',
        'Afronto los problemas con calma y busco soluciones',
        'Intento ver la pragmatica de las cosas',
        'Apasionado por el desarrollo de software y resolución de problemas complejos.',
        'Creativo y orientado a la innovación en el diseño de soluciones tecnológicas.',
        'Enfocado en el aprendizaje constante para mantenerme actualizado en las últimas tendencias.',
        'Habilidades sólidas en programación y diseño de arquitecturas de software.',
        'Comunicativo y colaborador, disfruto trabajando en equipo para alcanzar metas.',
        'Capacidad demostrada para liderar proyectos y coordinar equipos de desarrollo.',
        'Comprometido con la excelencia y la entrega oportuna de proyectos.',
        'Amante del código limpio y la implementación eficiente de algoritmos.',
        'Adaptable a entornos cambiantes y rápido para resolver desafíos inesperados.',
        'Con experiencia en el desarrollo de aplicaciones web escalables y robustas.',
        'Apasionado por la usabilidad y la experiencia del usuario.',
        'Orientado a resultados y enfocado en cumplir objetivos establecidos.',
        'Entusiasta del trabajo autónomo y la toma de decisiones informadas.',
        'Con habilidades analíticas para abordar problemas complejos de manera estructurada.',
        'Empático y capaz de comprender las necesidades del usuario final.',
        'Con habilidades de documentación claras y efectivas.',
        'Firme creyente en la importancia de la calidad del software.',
        'Entendimiento profundo de los principios de desarrollo ágil.',
        'Enfocado en mejorar continuamente los procesos de desarrollo.',
        'Autodidacta y siempre en busca de nuevas oportunidades para aprender.',
        'Capacidad para trabajar bajo presión y cumplir plazos ajustados.',
        'Inclinado hacia la resolución efectiva de problemas mediante el diseño.',
        'Innovador, siempre en busca de soluciones más eficientes y efectivas.',
        'Orientado al cliente, comprometido con la satisfacción del usuario.',
        'Entusiasta de la integración de tecnologías emergentes en proyectos.',
        'Con habilidades para la gestión de proyectos y planificación estratégica.',
        'Excelentes habilidades de comunicación tanto oral como escrita.',
        'Conocimientos avanzados en herramientas y frameworks modernos.',
        'Con mentalidad emprendedora y dispuesto a asumir desafíos ambiciosos.',
        'Apasionado por construir productos tecnológicos que impacten positivamente.',
    ];
}
