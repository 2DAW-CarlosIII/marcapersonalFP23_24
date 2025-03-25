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
            // Domain 1: Adaptability and Change Management
            [
                'domain_id' => 1,
                'name_en' => 'Openness to Change',
                'name_es' => 'Apertura al Cambio',
                'description_en' => 'Willingness to embrace new situations and perspectives with a positive attitude.',
                'description_es' => 'Disposición para aceptar nuevas situaciones y perspectivas con una actitud positiva.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 1, 'weight' => 1],
                        ['question_id' => 2, 'weight' => 1],
                        ['question_id' => 3, 'weight' => 1],
                        ['question_id' => 4, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 1,
                'name_en' => 'Flexibility',
                'name_es' => 'Flexibilidad',
                'description_en' => 'Ability to adjust plans and priorities based on changing circumstances.',
                'description_es' => 'Capacidad para ajustar planes y prioridades en función de circunstancias cambiantes.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 5, 'weight' => 1],
                        ['question_id' => 6, 'weight' => 1],
                        ['question_id' => 7, 'weight' => 1],
                        ['question_id' => 8, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 1,
                'name_en' => 'Resilience',
                'name_es' => 'Resiliencia',
                'description_en' => 'Ability to maintain effectiveness and focus during challenging or uncertain situations.',
                'description_es' => 'Capacidad para mantener la efectividad y el enfoque durante situaciones desafiantes o inciertas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 9, 'weight' => 1],
                        ['question_id' => 10, 'weight' => 1],
                        ['question_id' => 11, 'weight' => 1],
                        ['question_id' => 12, 'weight' => -1]
                    ]
                ])
            ],

            // Domain 2: Effective Communication
            [
                'domain_id' => 2,
                'name_en' => 'Expression Clarity',
                'name_es' => 'Claridad de Expresión',
                'description_en' => 'Ability to articulate ideas in a clear, structured, and understandable way.',
                'description_es' => 'Capacidad para articular ideas de forma clara, estructurada y comprensible.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 13, 'weight' => 1],
                        ['question_id' => 16, 'weight' => -1],
                        ['question_id' => 19, 'weight' => 1],
                        ['question_id' => 24, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 2,
                'name_en' => 'Active Listening',
                'name_es' => 'Escucha Activa',
                'description_en' => 'Attentiveness to others\' communication and ability to receive and process information effectively.',
                'description_es' => 'Atención a la comunicación de los demás y capacidad para recibir y procesar información de manera efectiva.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 14, 'weight' => 1],
                        ['question_id' => 20, 'weight' => -1],
                        ['question_id' => 21, 'weight' => 1],
                        ['question_id' => 23, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 2,
                'name_en' => 'Communication Adaptability',
                'name_es' => 'Adaptabilidad Comunicativa',
                'description_en' => 'Ability to adjust communication style to different audiences and contexts.',
                'description_es' => 'Capacidad para ajustar el estilo de comunicación a diferentes audiencias y contextos.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 15, 'weight' => 1],
                        ['question_id' => 17, 'weight' => 1],
                        ['question_id' => 18, 'weight' => 1],
                        ['question_id' => 22, 'weight' => 1]
                    ]
                ])
            ],

            // Domain 3: Critical Thinking and Problem Solving
            [
                'domain_id' => 3,
                'name_en' => 'Information Analysis',
                'name_es' => 'Análisis de Información',
                'description_en' => 'Ability to gather, evaluate, and process relevant information for problem-solving.',
                'description_es' => 'Capacidad para recopilar, evaluar y procesar información relevante para la resolución de problemas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 25, 'weight' => 1],
                        ['question_id' => 27, 'weight' => 1],
                        ['question_id' => 28, 'weight' => -1],
                        ['question_id' => 32, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 3,
                'name_en' => 'Creative Problem-Solving',
                'name_es' => 'Resolución Creativa de Problemas',
                'description_en' => 'Ability to develop innovative and effective solutions to challenges.',
                'description_es' => 'Capacidad para desarrollar soluciones innovadoras y efectivas a los desafíos.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 29, 'weight' => 1],
                        ['question_id' => 30, 'weight' => 1],
                        ['question_id' => 33, 'weight' => 1],
                        ['question_id' => 36, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 3,
                'name_en' => 'Decision-Making',
                'name_es' => 'Toma de Decisiones',
                'description_en' => 'Ability to evaluate alternatives and make sound judgments based on analysis and reflection.',
                'description_es' => 'Capacidad para evaluar alternativas y tomar decisiones acertadas basadas en análisis y reflexión.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 26, 'weight' => 1],
                        ['question_id' => 31, 'weight' => 1],
                        ['question_id' => 34, 'weight' => 1],
                        ['question_id' => 35, 'weight' => 1]
                    ]
                ])
            ],

            // Domain 4: Teamwork and Collaboration
            [
                'domain_id' => 4,
                'name_en' => 'Team Integration',
                'name_es' => 'Integración en Equipo',
                'description_en' => 'Ability to contribute effectively to team objectives and participate actively in collaborative work.',
                'description_es' => 'Capacidad para contribuir eficazmente a los objetivos del equipo y participar activamente en el trabajo colaborativo.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 37, 'weight' => 1],
                        ['question_id' => 40, 'weight' => -1],
                        ['question_id' => 42, 'weight' => 1],
                        ['question_id' => 47, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 4,
                'name_en' => 'Perspective Respect',
                'name_es' => 'Respeto a Perspectivas',
                'description_en' => 'Ability to value and incorporate diverse viewpoints in collaborative work.',
                'description_es' => 'Capacidad para valorar e incorporar puntos de vista diversos en el trabajo colaborativo.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 38, 'weight' => 1],
                        ['question_id' => 44, 'weight' => -1],
                        ['question_id' => 45, 'weight' => 1],
                        ['question_id' => 48, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 4,
                'name_en' => 'Supportive Behavior',
                'name_es' => 'Comportamiento de Apoyo',
                'description_en' => 'Ability to provide help, encouragement, and constructive contributions to team members.',
                'description_es' => 'Capacidad para brindar ayuda, aliento y contribuciones constructivas a los miembros del equipo.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 39, 'weight' => 1],
                        ['question_id' => 41, 'weight' => 1],
                        ['question_id' => 43, 'weight' => 1],
                        ['question_id' => 46, 'weight' => 1]
                    ]
                ])
            ],

            // Domain 5: Time Management and Organization
            [
                'domain_id' => 5,
                'name_en' => 'Planning and Prioritization',
                'name_es' => 'Planificación y Priorización',
                'description_en' => 'Ability to establish clear action plans and determine task importance and order.',
                'description_es' => 'Capacidad para establecer planes de acción claros y determinar la importancia y orden de las tareas.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 49, 'weight' => 1],
                        ['question_id' => 51, 'weight' => 1],
                        ['question_id' => 53, 'weight' => 1],
                        ['question_id' => 56, 'weight' => -1]
                    ]
                ])
            ],
            [
                'domain_id' => 5,
                'name_en' => 'Task Execution',
                'name_es' => 'Ejecución de Tareas',
                'description_en' => 'Ability to complete assignments effectively and within established timeframes.',
                'description_es' => 'Capacidad para completar asignaciones de manera efectiva y dentro de los plazos establecidos.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 52, 'weight' => -1],
                        ['question_id' => 54, 'weight' => 1],
                        ['question_id' => 57, 'weight' => 1],
                        ['question_id' => 58, 'weight' => 1]
                    ]
                ])
            ],
            [
                'domain_id' => 5,
                'name_en' => 'Organization',
                'name_es' => 'Organización',
                'description_en' => 'Ability to structure and arrange resources, tasks, and information in an efficient manner.',
                'description_es' => 'Capacidad para estructurar y organizar recursos, tareas e información de manera eficiente.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 50, 'weight' => 1],
                        ['question_id' => 55, 'weight' => 1],
                        ['question_id' => 59, 'weight' => 1],
                        ['question_id' => 60, 'weight' => -1]
                    ]
                ])
            ],
        ];

        foreach ($facets as $facet) {
            DB::table('facets')->insert($facet);
        }
    }
}
