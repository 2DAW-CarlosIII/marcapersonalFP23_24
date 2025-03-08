<?php

namespace Database\Seeders\BFI2;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domains = [
            [
                'name_en' => 'Extraversion',
                'name_es' => 'Extraversión',
                'description_en' => 'Sociability, assertiveness, and energetic enthusiasm for social interactions. People high in Extraversion are outgoing and draw energy from social activity.',
                'description_es' => 'Sociabilidad, asertividad y entusiasmo enérgico por las interacciones sociales. Las personas con alta Extraversión son extrovertidas y obtienen energía de la actividad social.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 1, 'weight' => 1],
                        ['question_id' => 6, 'weight' => 1],
                        ['question_id' => 11, 'weight' => -1],
                        ['question_id' => 16, 'weight' => -1],
                        ['question_id' => 21, 'weight' => 1],
                        ['question_id' => 26, 'weight' => -1],
                        ['question_id' => 31, 'weight' => -1],
                        ['question_id' => 36, 'weight' => -1],
                        ['question_id' => 41, 'weight' => 1],
                        ['question_id' => 46, 'weight' => 1],
                        ['question_id' => 51, 'weight' => -1],
                        ['question_id' => 56, 'weight' => 1]
                    ]
                ])
            ],
            [
                'name_en' => 'Agreeableness',
                'name_es' => 'Amabilidad',
                'description_en' => 'Compassion, respectfulness, and trust in others. People high in Agreeableness value getting along with others and tend to be cooperative and considerate.',
                'description_es' => 'Compasión, respeto y confianza en los demás. Las personas con alta Amabilidad valoran llevarse bien con los demás y tienden a ser cooperativas y consideradas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 2, 'weight' => 1],
                        ['question_id' => 7, 'weight' => 1],
                        ['question_id' => 12, 'weight' => -1],
                        ['question_id' => 17, 'weight' => -1],
                        ['question_id' => 22, 'weight' => -1],
                        ['question_id' => 27, 'weight' => 1],
                        ['question_id' => 32, 'weight' => 1],
                        ['question_id' => 37, 'weight' => -1],
                        ['question_id' => 42, 'weight' => -1],
                        ['question_id' => 47, 'weight' => -1],
                        ['question_id' => 52, 'weight' => 1],
                        ['question_id' => 57, 'weight' => 1]
                    ]
                ])
            ],
            [
                'name_en' => 'Conscientiousness',
                'name_es' => 'Responsabilidad',
                'description_en' => 'Organization, productivity, and reliability. People high in Conscientiousness prefer order and structure, work persistently toward goals, and are dependable.',
                'description_es' => 'Organización, productividad y fiabilidad. Las personas con alta Responsabilidad prefieren el orden y la estructura, trabajan persistentemente hacia sus metas y son confiables.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 3, 'weight' => -1],
                        ['question_id' => 8, 'weight' => -1],
                        ['question_id' => 13, 'weight' => 1],
                        ['question_id' => 18, 'weight' => 1],
                        ['question_id' => 23, 'weight' => -1],
                        ['question_id' => 28, 'weight' => -1],
                        ['question_id' => 33, 'weight' => 1],
                        ['question_id' => 38, 'weight' => 1],
                        ['question_id' => 43, 'weight' => 1],
                        ['question_id' => 48, 'weight' => -1],
                        ['question_id' => 53, 'weight' => 1],
                        ['question_id' => 58, 'weight' => -1]
                    ]
                ])
            ],
            [
                'name_en' => 'Negative Emotionality',
                'name_es' => 'Neuroticismo',
                'description_en' => 'Anxiety, depression, and emotional volatility. People high in Negative Emotionality tend to experience more negative emotions and have difficulty coping with stress.',
                'description_es' => 'Ansiedad, depresión e inestabilidad emocional. Las personas con alto Neuroticismo tienden a experimentar más emociones negativas y tienen dificultades para afrontar el estrés.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 4, 'weight' => -1],
                        ['question_id' => 9, 'weight' => -1],
                        ['question_id' => 14, 'weight' => 1],
                        ['question_id' => 19, 'weight' => 1],
                        ['question_id' => 24, 'weight' => -1],
                        ['question_id' => 29, 'weight' => -1],
                        ['question_id' => 34, 'weight' => 1],
                        ['question_id' => 39, 'weight' => 1],
                        ['question_id' => 44, 'weight' => -1],
                        ['question_id' => 49, 'weight' => -1],
                        ['question_id' => 54, 'weight' => 1],
                        ['question_id' => 59, 'weight' => 1]
                    ]
                ])
            ],
            [
                'name_en' => 'Open-Mindedness',
                'name_es' => 'Apertura',
                'description_en' => 'Intellectual curiosity, aesthetic sensitivity, and creative imagination. People high in Open-Mindedness are curious, creative, and open to new experiences and ideas.',
                'description_es' => 'Curiosidad intelectual, sensibilidad estética e imaginación creativa. Las personas con alta Apertura son curiosas, creativas y abiertas a nuevas experiencias e ideas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 5, 'weight' => -1],
                        ['question_id' => 10, 'weight' => 1],
                        ['question_id' => 15, 'weight' => 1],
                        ['question_id' => 20, 'weight' => 1],
                        ['question_id' => 25, 'weight' => -1],
                        ['question_id' => 30, 'weight' => -1],
                        ['question_id' => 35, 'weight' => 1],
                        ['question_id' => 40, 'weight' => 1],
                        ['question_id' => 45, 'weight' => -1],
                        ['question_id' => 50, 'weight' => -1],
                        ['question_id' => 55, 'weight' => -1],
                        ['question_id' => 60, 'weight' => 1]
                    ]
                ])
            ],
        ];

        foreach ($domains as $domain) {
            DB::table('domains')->insert($domain);
        }
    }
}
