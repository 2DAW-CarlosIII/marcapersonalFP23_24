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
                'name_en' => 'Adaptability and Change Management',
                'name_es' => 'Adaptabilidad y Gestión del Cambio',
                'description_en' => 'Ability to adjust to new situations, embrace change, and maintain effectiveness during transitions or unexpected events. Includes openness to change, flexibility in adjusting plans, and resilience in challenging situations.',
                'description_es' => 'Capacidad para ajustarse a nuevas situaciones, aceptar cambios y mantener la efectividad durante transiciones o eventos inesperados. Incluye apertura al cambio, flexibilidad para ajustar planes y resiliencia en situaciones desafiantes.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 1, 'weight' => 1],
                        ['question_id' => 2, 'weight' => 1],
                        ['question_id' => 3, 'weight' => 1],
                        ['question_id' => 4, 'weight' => -1],
                        ['question_id' => 5, 'weight' => 1],
                        ['question_id' => 6, 'weight' => 1],
                        ['question_id' => 7, 'weight' => 1],
                        ['question_id' => 8, 'weight' => -1],
                        ['question_id' => 9, 'weight' => 1],
                        ['question_id' => 10, 'weight' => 1],
                        ['question_id' => 11, 'weight' => 1],
                        ['question_id' => 12, 'weight' => -1]
                    ]
                ])
            ],
            [
                'name_en' => 'Effective Communication',
                'name_es' => 'Comunicación Efectiva',
                'description_en' => 'Ability to clearly express ideas and actively listen to others. Includes clarity in expression, attentive listening, and adapting communication style to different audiences and contexts.',
                'description_es' => 'Capacidad para expresar ideas claramente y escuchar activamente a los demás. Incluye claridad en la expresión, escucha atenta y adaptación del estilo comunicativo a diferentes audiencias y contextos.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 13, 'weight' => 1],
                        ['question_id' => 14, 'weight' => 1],
                        ['question_id' => 15, 'weight' => 1],
                        ['question_id' => 16, 'weight' => -1],
                        ['question_id' => 17, 'weight' => 1],
                        ['question_id' => 18, 'weight' => 1],
                        ['question_id' => 19, 'weight' => 1],
                        ['question_id' => 20, 'weight' => -1],
                        ['question_id' => 21, 'weight' => 1],
                        ['question_id' => 22, 'weight' => 1],
                        ['question_id' => 23, 'weight' => 1],
                        ['question_id' => 24, 'weight' => -1]
                    ]
                ])
            ],
            [
                'name_en' => 'Critical Thinking and Problem Solving',
                'name_es' => 'Pensamiento Crítico y Resolución de Problemas',
                'description_en' => 'Ability to analyze information, evaluate alternatives, and develop effective solutions. Includes information analysis, creative problem-solving, and systematic decision-making processes.',
                'description_es' => 'Capacidad para analizar información, evaluar alternativas y desarrollar soluciones efectivas. Incluye análisis de información, resolución creativa de problemas y procesos sistemáticos de toma de decisiones.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 25, 'weight' => 1],
                        ['question_id' => 26, 'weight' => 1],
                        ['question_id' => 27, 'weight' => 1],
                        ['question_id' => 28, 'weight' => -1],
                        ['question_id' => 29, 'weight' => 1],
                        ['question_id' => 30, 'weight' => 1],
                        ['question_id' => 31, 'weight' => 1],
                        ['question_id' => 32, 'weight' => -1],
                        ['question_id' => 33, 'weight' => 1],
                        ['question_id' => 34, 'weight' => 1],
                        ['question_id' => 35, 'weight' => 1],
                        ['question_id' => 36, 'weight' => -1]
                    ]
                ])
            ],
            [
                'name_en' => 'Teamwork and Collaboration',
                'name_es' => 'Trabajo en Equipo y Colaboración',
                'description_en' => 'Ability to work effectively with others to achieve common goals. Includes team integration, respect for diverse perspectives, and supportive behavior toward teammates.',
                'description_es' => 'Capacidad para trabajar efectivamente con otros para lograr objetivos comunes. Incluye integración en equipo, respeto a perspectivas diversas y comportamiento de apoyo hacia los compañeros.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 37, 'weight' => 1],
                        ['question_id' => 38, 'weight' => 1],
                        ['question_id' => 39, 'weight' => 1],
                        ['question_id' => 40, 'weight' => -1],
                        ['question_id' => 41, 'weight' => 1],
                        ['question_id' => 42, 'weight' => 1],
                        ['question_id' => 43, 'weight' => 1],
                        ['question_id' => 44, 'weight' => -1],
                        ['question_id' => 45, 'weight' => 1],
                        ['question_id' => 46, 'weight' => 1],
                        ['question_id' => 47, 'weight' => 1],
                        ['question_id' => 48, 'weight' => -1]
                    ]
                ])
            ],
            [
                'name_en' => 'Time Management and Organization',
                'name_es' => 'Gestión del Tiempo y Organización',
                'description_en' => 'Ability to effectively plan, prioritize, and execute tasks to meet deadlines. Includes planning and prioritization, efficient task execution, and systematic organization of resources and activities.',
                'description_es' => 'Capacidad para planificar, priorizar y ejecutar tareas eficazmente para cumplir plazos. Incluye planificación y priorización, ejecución eficiente de tareas y organización sistemática de recursos y actividades.',
                'formula' => json_encode([
                    'items' => [
                        ['question_id' => 49, 'weight' => 1],
                        ['question_id' => 50, 'weight' => 1],
                        ['question_id' => 51, 'weight' => 1],
                        ['question_id' => 52, 'weight' => -1],
                        ['question_id' => 53, 'weight' => 1],
                        ['question_id' => 54, 'weight' => 1],
                        ['question_id' => 55, 'weight' => 1],
                        ['question_id' => 56, 'weight' => -1],
                        ['question_id' => 57, 'weight' => 1],
                        ['question_id' => 58, 'weight' => 1],
                        ['question_id' => 59, 'weight' => 1],
                        ['question_id' => 60, 'weight' => -1]
                    ]
                ])
            ],
        ];

        foreach ($domains as $domain) {
            DB::table('domains')->insert($domain);
        }
    }
}
