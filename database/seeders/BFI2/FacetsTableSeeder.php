<?php

namespace Database\Seeders\BFI2;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facets = [
            // Extraversion (Domain 1)
            [
                'domain_id' => 1,
                'name_en' => 'Sociability',
                'name_es' => 'Sociabilidad',
                'description_en' => 'Preference for being in the company of others, outgoing social behavior.',
                'description_es' => 'Preferencia por estar en compañía de otros, comportamiento social extrovertido.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 1, 'weight' => 1],
                        ['question_id' => 16, 'weight' => -1],
                        ['question_id' => 31, 'weight' => -1],
                        ['question_id' => 46, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 1,
                'name_en' => 'Assertiveness',
                'name_es' => 'Asertividad',
                'description_en' => 'Tendency to speak up, take charge, and lead others.',
                'description_es' => 'Tendencia a expresarse, tomar el control y liderar a otros.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 6, 'weight' => 1],
                        ['question_id' => 21, 'weight' => 1],
                        ['question_id' => 36, 'weight' => -1],
                        ['question_id' => 51, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 1,
                'name_en' => 'Energy Level',
                'name_es' => 'Nivel de Energía',
                'description_en' => 'Pace of living, vigor and enthusiasm in activity.',
                'description_es' => 'Ritmo de vida, vigor y entusiasmo en la actividad.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 11, 'weight' => -1],
                        ['question_id' => 26, 'weight' => -1],
                        ['question_id' => 41, 'weight' => 1],
                        ['question_id' => 56, 'weight' => 1]
                    ]
                ])
            ],

            // Agreeableness (Domain 2)
            [
                'domain_id' => 2,
                'name_en' => 'Compassion',
                'name_es' => 'Compasión',
                'description_en' => 'Tendency to care about others and their needs.',
                'description_es' => 'Tendencia a preocuparse por los demás y sus necesidades.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 2, 'weight' => 1],
                        ['question_id' => 17, 'weight' => -1],
                        ['question_id' => 32, 'weight' => 1],
                        ['question_id' => 47, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 2,
                'name_en' => 'Respectfulness',
                'name_es' => 'Respeto',
                'description_en' => 'Regard for others\' needs and boundaries, polite behavior.',
                'description_es' => 'Consideración por las necesidades y límites de los demás, comportamiento educado.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 7, 'weight' => 1],
                        ['question_id' => 22, 'weight' => -1],
                        ['question_id' => 37, 'weight' => -1],
                        ['question_id' => 52, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 2,
                'name_en' => 'Trust',
                'name_es' => 'Confianza',
                'description_en' => 'Belief in others\' good intentions and sincerity.',
                'description_es' => 'Creencia en las buenas intenciones y sinceridad de los demás.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 12, 'weight' => -1],
                        ['question_id' => 27, 'weight' => 1],
                        ['question_id' => 42, 'weight' => -1],
                        ['question_id' => 57, 'weight' => 1]
                    ]
                ])
            ],

            // Conscientiousness (Domain 3)
            [
                'domain_id' => 3,
                'name_en' => 'Organization',
                'name_es' => 'Organización',
                'description_en' => 'Tendency to keep things tidy and orderly.',
                'description_es' => 'Tendencia a mantener las cosas ordenadas y sistemáticas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 3, 'weight' => -1],
                        ['question_id' => 18, 'weight' => 1],
                        ['question_id' => 33, 'weight' => 1],
                        ['question_id' => 48, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 3,
                'name_en' => 'Productiveness',
                'name_es' => 'Productividad',
                'description_en' => 'Drive to accomplish goals and complete tasks efficiently.',
                'description_es' => 'Motivación para lograr objetivos y completar tareas eficientemente.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 8, 'weight' => -1],
                        ['question_id' => 23, 'weight' => -1],
                        ['question_id' => 38, 'weight' => 1],
                        ['question_id' => 53, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 3,
                'name_en' => 'Responsibility',
                'name_es' => 'Responsabilidad',
                'description_en' => 'Reliability in meeting obligations and commitments.',
                'description_es' => 'Fiabilidad en el cumplimiento de obligaciones y compromisos.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 13, 'weight' => 1],
                        ['question_id' => 28, 'weight' => -1],
                        ['question_id' => 43, 'weight' => 1],
                        ['question_id' => 58, 'weight' => -1]
                    ]
                ])
            ],

            // Negative Emotionality (Domain 4)
            [
                'domain_id' => 4,
                'name_en' => 'Anxiety',
                'name_es' => 'Ansiedad',
                'description_en' => 'Tendency to worry and experience tension.',
                'description_es' => 'Tendencia a preocuparse y experimentar tensión.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 4, 'weight' => -1],
                        ['question_id' => 19, 'weight' => 1],
                        ['question_id' => 34, 'weight' => 1],
                        ['question_id' => 49, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 4,
                'name_en' => 'Depression',
                'name_es' => 'Depresión',
                'description_en' => 'Tendency to experience sadness and dejection.',
                'description_es' => 'Tendencia a experimentar tristeza y abatimiento.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 9, 'weight' => -1],
                        ['question_id' => 24, 'weight' => -1],
                        ['question_id' => 39, 'weight' => 1],
                        ['question_id' => 54, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 4,
                'name_en' => 'Emotional Volatility',
                'name_es' => 'Inestabilidad Emocional',
                'description_en' => 'Variations in emotional states, difficulty controlling negative emotions.',
                'description_es' => 'Variaciones en los estados emocionales, dificultad para controlar emociones negativas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 14, 'weight' => 1],
                        ['question_id' => 29, 'weight' => -1],
                        ['question_id' => 44, 'weight' => -1],
                        ['question_id' => 59, 'weight' => 1]
                    ]
                ])
            ],

            // Open-Mindedness (Domain 5)
            [
                'domain_id' => 5,
                'name_en' => 'Intellectual Curiosity',
                'name_es' => 'Curiosidad Intelectual',
                'description_en' => 'Interest in ideas and love of learning and exploring.',
                'description_es' => 'Interés en las ideas y amor por el aprendizaje y la exploración.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 10, 'weight' => 1],
                        ['question_id' => 25, 'weight' => -1],
                        ['question_id' => 40, 'weight' => 1],
                        ['question_id' => 55, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 5,
                'name_en' => 'Aesthetic Sensitivity',
                'name_es' => 'Sensibilidad Estética',
                'description_en' => 'Appreciation for art, beauty, and nature.',
                'description_es' => 'Apreciación por el arte, la belleza y la naturaleza.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 5, 'weight' => -1],
                        ['question_id' => 20, 'weight' => 1],
                        ['question_id' => 35, 'weight' => 1],
                        ['question_id' => 50, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 5,
                'name_en' => 'Creative Imagination',
                'name_es' => 'Imaginación Creativa',
                'description_en' => 'Capacity for original thinking and innovative ideas.',
                'description_es' => 'Capacidad para el pensamiento original y las ideas innovadoras.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 15, 'weight' => 1],
                        ['question_id' => 30, 'weight' => -1],
                        ['question_id' => 45, 'weight' => -1],
                        ['question_id' => 60, 'weight' => 1]
                    ]
                ])
            ],
        ];

        foreach ($facets as $facet) {
            DB::table('facets')->insert($facet);
        }
    }
}
