<?php

namespace Database\Seeders\BFI2;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Domain 1: Adaptability and Change Management
            // Facet 1: Openness to Change
            [
                'id' => 1,
                'facet_id' => 1,
                'text_en' => 'I feel comfortable with unexpected changes in my work or study environment.',
                'text_es' => 'Me siento cómodo/a con cambios inesperados en mi entorno de trabajo o estudio.'
            ],
            [
                'id' => 2,
                'facet_id' => 1,
                'text_en' => 'I easily adapt to new work methods, even if they require stepping out of my comfort zone.',
                'text_es' => 'Me adapto con facilidad a nuevos métodos de trabajo, incluso si implican salir de mi zona de confort.'
            ],
            [
                'id' => 3,
                'facet_id' => 1,
                'text_en' => 'I am motivated by the opportunity to acquire new skills when facing changes in my environment.',
                'text_es' => 'Me motiva la oportunidad de adquirir nuevas habilidades ante cambios en mi entorno.'
            ],
            [
                'id' => 4,
                'facet_id' => 1,
                'text_en' => 'I prefer things to remain the same and am uncomfortable with novelty.',
                'text_es' => 'Prefiero que las cosas se mantengan iguales y me incomoda la novedad.'
            ],

            // Facet 2: Flexibility
            [
                'id' => 5,
                'facet_id' => 2,
                'text_en' => 'I learn new technologies or tools quickly and autonomously.',
                'text_es' => 'Aprendo nuevas tecnologías o herramientas de forma rápida y autónoma.'
            ],
            [
                'id' => 6,
                'facet_id' => 2,
                'text_en' => 'When assigned tasks are modified, I can reorganize my priorities without difficulty.',
                'text_es' => 'Cuando las tareas asignadas se modifican, puedo reorganizar mis prioridades sin dificultad.'
            ],
            [
                'id' => 7,
                'facet_id' => 2,
                'text_en' => 'I accept and use feedback to improve my performance.',
                'text_es' => 'Acepto y utilizo el feedback recibido para mejorar mi desempeño.'
            ],
            [
                'id' => 8,
                'facet_id' => 2,
                'text_en' => 'I struggle to reorganize my tasks when unexpected events arise.',
                'text_es' => 'Me cuesta reorganizar mis tareas cuando surgen imprevistos.'
            ],

            // Facet 3: Resilience
            [
                'id' => 9,
                'facet_id' => 3,
                'text_en' => 'When faced with unforeseen problems, I seek solutions calmly and effectively.',
                'text_es' => 'Frente a problemas imprevistos, busco soluciones de forma calmada y efectiva.'
            ],
            [
                'id' => 10,
                'facet_id' => 3,
                'text_en' => 'I find the positive side in situations of change and see them as learning opportunities.',
                'text_es' => 'Encuentro el lado positivo en las situaciones de cambio y las veo como oportunidades de aprendizaje.'
            ],
            [
                'id' => 11,
                'facet_id' => 3,
                'text_en' => 'I maintain control and concentration even in uncertain circumstances.',
                'text_es' => 'Mantengo el control y la concentración incluso en circunstancias inciertas.'
            ],
            [
                'id' => 12,
                'facet_id' => 3,
                'text_en' => 'I find it very difficult to adapt to unexpected changes.',
                'text_es' => 'Me resulta muy difícil adaptarme a cambios inesperados.'
            ],

            // Domain 2: Effective Communication
            // Facet 4: Expression Clarity
            [
                'id' => 13,
                'facet_id' => 4,
                'text_en' => 'I explain my ideas clearly and in a structured way, both orally and in writing.',
                'text_es' => 'Explico mis ideas de forma clara y estructurada, tanto oral como escrita.'
            ],
            [
                'id' => 16,
                'facet_id' => 4,
                'text_en' => 'I have difficulties expressing my ideas coherently.',
                'text_es' => 'Tengo dificultades para expresar mis ideas de forma coherente.'
            ],
            [
                'id' => 19,
                'facet_id' => 4,
                'text_en' => 'I use concrete examples to facilitate understanding of my ideas.',
                'text_es' => 'Utilizo ejemplos concretos para facilitar la comprensión de mis ideas.'
            ],
            [
                'id' => 24,
                'facet_id' => 4,
                'text_en' => 'I struggle to adapt my message to different audiences.',
                'text_es' => 'Me cuesta adaptar mi mensaje a diferentes audiencias.'
            ],

            // Facet 5: Active Listening
            [
                'id' => 14,
                'facet_id' => 5,
                'text_en' => 'I actively listen to people when they communicate their ideas to me.',
                'text_es' => 'Escucho activamente a las personas cuando me comunican sus ideas.'
            ],
            [
                'id' => 20,
                'facet_id' => 5,
                'text_en' => 'I often interrupt others without allowing them to finish their thoughts.',
                'text_es' => 'A menudo interrumpo a otros sin permitirles terminar sus pensamientos.'
            ],
            [
                'id' => 21,
                'facet_id' => 5,
                'text_en' => 'I recognize the importance of listening before responding in a conversation.',
                'text_es' => 'Reconozco la importancia de escuchar antes de responder en una conversación.'
            ],
            [
                'id' => 23,
                'facet_id' => 5,
                'text_en' => 'I avoid interrupting people while they are speaking.',
                'text_es' => 'Evito interrumpir a las personas mientras están hablando.'
            ],

            // Facet 6: Communication Adaptability
            [
                'id' => 15,
                'facet_id' => 6,
                'text_en' => 'I adapt my communication style according to the characteristics and needs of my audience.',
                'text_es' => 'Adapto mi forma de comunicarme según las características y necesidades de mi interlocutor.'
            ],
            [
                'id' => 17,
                'facet_id' => 6,
                'text_en' => 'I immediately ask for clarification when I don\'t understand something.',
                'text_es' => 'Pido aclaraciones de inmediato cuando no entiendo algo.'
            ],
            [
                'id' => 18,
                'facet_id' => 6,
                'text_en' => 'I feel comfortable participating in presentations and group meetings.',
                'text_es' => 'Me siento cómodo/a participando en presentaciones y reuniones de grupo.'
            ],
            [
                'id' => 22,
                'facet_id' => 6,
                'text_en' => 'I maintain a respectful tone in all my interactions.',
                'text_es' => 'Mantengo un tono respetuoso en todas mis interacciones.'
            ],

            // Domain 3: Critical Thinking and Problem Solving
            // Facet 7: Information Analysis
            [
                'id' => 25,
                'facet_id' => 7,
                'text_en' => 'I carefully analyze a problem before making a decision.',
                'text_es' => 'Analizo detenidamente un problema antes de tomar una decisión.'
            ],
            [
                'id' => 27,
                'facet_id' => 7,
                'text_en' => 'I question the information I receive and seek to confirm it before accepting it.',
                'text_es' => 'Cuestiono la información que recibo y busco confirmarla antes de aceptarla.'
            ],
            [
                'id' => 28,
                'facet_id' => 7,
                'text_en' => 'I struggle to question the information presented to me.',
                'text_es' => 'Me cuesta cuestionar la información que se me presenta.'
            ],
            [
                'id' => 32,
                'facet_id' => 7,
                'text_en' => 'I prefer to make decisions quickly without thoroughly analyzing the situation.',
                'text_es' => 'Prefiero tomar decisiones rápidamente sin analizar a fondo la situación.'
            ],

            // Facet 8: Creative Problem-Solving
            [
                'id' => 29,
                'facet_id' => 8,
                'text_en' => 'I identify both positive and negative aspects in complex situations.',
                'text_es' => 'Identifico tanto los aspectos positivos como negativos en situaciones complejas.'
            ],
            [
                'id' => 30,
                'facet_id' => 8,
                'text_en' => 'I find creative solutions to the challenges I face.',
                'text_es' => 'Encuentro soluciones creativas a los desafíos que enfrento.'
            ],
            [
                'id' => 33,
                'facet_id' => 8,
                'text_en' => 'I thoroughly investigate the causes of a failure rather than seeking hasty solutions.',
                'text_es' => 'Investigo a fondo las causas de un fallo en lugar de buscar soluciones apresuradas.'
            ],
            [
                'id' => 36,
                'facet_id' => 8,
                'text_en' => 'I rarely evaluate the possible consequences of my decisions.',
                'text_es' => 'Rara vez evalúo las posibles consecuencias de mis decisiones.'
            ],

            // Facet 9: Decision-Making
            [
                'id' => 26,
                'facet_id' => 9,
                'text_en' => 'I consider various alternatives and evaluate their consequences before choosing a solution.',
                'text_es' => 'Considero diversas alternativas y evalúo sus consecuencias antes de elegir una solución.'
            ],
            [
                'id' => 31,
                'facet_id' => 9,
                'text_en' => 'I evaluate different points of view before making important decisions.',
                'text_es' => 'Evalúo diferentes puntos de vista antes de tomar decisiones importantes.'
            ],
            [
                'id' => 34,
                'facet_id' => 9,
                'text_en' => 'I reflect on the short and long-term consequences of my decisions.',
                'text_es' => 'Reflexiono sobre las consecuencias de mis decisiones a corto y largo plazo.'
            ],
            [
                'id' => 35,
                'facet_id' => 9,
                'text_en' => 'I maintain objectivity and avoid letting my emotions influence my decisions.',
                'text_es' => 'Mantengo la objetividad y evito que mis emociones influyan en mis decisiones.'
            ],

            // Domain 4: Teamwork and Collaboration
            // Facet 10: Team Integration
            [
                'id' => 37,
                'facet_id' => 10,
                'text_en' => 'I enjoy working in teams to achieve common goals.',
                'text_es' => 'Disfruto trabajar en equipo para alcanzar objetivos comunes.'
            ],
            [
                'id' => 40,
                'facet_id' => 10,
                'text_en' => 'I prefer to work alone rather than collaborate with others.',
                'text_es' => 'Prefiero trabajar solo/a en lugar de colaborar con otros.'
            ],
            [
                'id' => 42,
                'facet_id' => 10,
                'text_en' => 'I adapt to different roles within the team according to the project\'s needs.',
                'text_es' => 'Me adapto a diferentes roles dentro del equipo según las necesidades del proyecto.'
            ],
            [
                'id' => 47,
                'facet_id' => 10,
                'text_en' => 'I fulfill my responsibilities, actively contributing to the team\'s success.',
                'text_es' => 'Cumplo con mis responsabilidades, contribuyendo activamente al éxito del equipo.'
            ],

            // Facet 11: Perspective Respect
            [
                'id' => 38,
                'facet_id' => 11,
                'text_en' => 'I value and respect my teammates\' ideas, even when they differ from mine.',
                'text_es' => 'Valoro y respeto las ideas de mis compañeros, aunque sean diferentes a las mías.'
            ],
            [
                'id' => 44,
                'facet_id' => 11,
                'text_en' => 'I find it difficult to accept my teammates\' ideas.',
                'text_es' => 'Me cuesta aceptar las ideas de mis compañeros.'
            ],
            [
                'id' => 45,
                'facet_id' => 11,
                'text_en' => 'I communicate openly and respectfully with the team.',
                'text_es' => 'Me comunico de forma abierta y respetuosa con el equipo.'
            ],
            [
                'id' => 48,
                'facet_id' => 11,
                'text_en' => 'I find it difficult to resolve conflicts and generate consensus in the group.',
                'text_es' => 'Encuentro difícil resolver conflictos y generar consenso en el grupo.'
            ],

            // Facet 12: Supportive Behavior
            [
                'id' => 39,
                'facet_id' => 12,
                'text_en' => 'I strive to resolve conflicts within the team in a fair and constructive manner.',
                'text_es' => 'Me esfuerzo por resolver conflictos dentro del equipo de manera justa y constructiva.'
            ],
            [
                'id' => 41,
                'facet_id' => 12,
                'text_en' => 'I share my knowledge and experience to enrich the group\'s work.',
                'text_es' => 'Comparto mi conocimiento y experiencia para enriquecer el trabajo del grupo.'
            ],
            [
                'id' => 43,
                'facet_id' => 12,
                'text_en' => 'I encourage and support my teammates when we face difficulties.',
                'text_es' => 'Animo y apoyo a mis compañeros cuando enfrentamos dificultades.'
            ],
            [
                'id' => 46,
                'facet_id' => 12,
                'text_en' => 'I am willing to ask for and offer help when necessary.',
                'text_es' => 'Estoy dispuesto/a a pedir y ofrecer ayuda cuando es necesario.'
            ],

            // Domain 5: Time Management and Organization
            // Facet 13: Planning and Prioritization
            [
                'id' => 49,
                'facet_id' => 13,
                'text_en' => 'I plan my time effectively before starting important tasks.',
                'text_es' => 'Planifico mi tiempo de manera efectiva antes de iniciar tareas importantes.'
            ],
            [
                'id' => 51,
                'facet_id' => 13,
                'text_en' => 'I establish clear priorities when I have multiple tasks to attend to.',
                'text_es' => 'Establezco prioridades claras cuando tengo múltiples tareas que atender.'
            ],
            [
                'id' => 53,
                'facet_id' => 13,
                'text_en' => 'I meet established deadlines without needing reminders.',
                'text_es' => 'Cumplo con los plazos establecidos sin necesidad de recordatorios.'
            ],
            [
                'id' => 56,
                'facet_id' => 13,
                'text_en' => 'I find it difficult to establish clear priorities in my daily work.',
                'text_es' => 'Me resulta difícil establecer prioridades claras en mi trabajo diario.'
            ],

            // Facet 14: Task Execution
            [
                'id' => 52,
                'facet_id' => 14,
                'text_en' => 'I tend to leave my tasks until the last minute and struggle to meet deadlines.',
                'text_es' => 'Suelo dejar mis tareas para el último momento y me cuesta cumplir los plazos.'
            ],
            [
                'id' => 54,
                'facet_id' => 14,
                'text_en' => 'I avoid distractions and focus on tasks that require attention.',
                'text_es' => 'Evito distracciones y me concentro en tareas que requieren atención.'
            ],
            [
                'id' => 57,
                'facet_id' => 14,
                'text_en' => 'I strive to be punctual in my commitments and responsibilities.',
                'text_es' => 'Me esfuerzo por ser puntual en mis compromisos y responsabilidades.'
            ],
            [
                'id' => 58,
                'facet_id' => 14,
                'text_en' => 'I regularly review my progress to ensure I\'m on the right track.',
                'text_es' => 'Reviso regularmente mi progreso para asegurarme de estar en el camino correcto.'
            ],

            // Facet 15: Organization
            [
                'id' => 50,
                'facet_id' => 15,
                'text_en' => 'I use tools such as calendars or task lists to organize my activities.',
                'text_es' => 'Utilizo herramientas como agendas o listas de tareas para organizar mis actividades.'
            ],
            [
                'id' => 55,
                'facet_id' => 15,
                'text_en' => 'I break down complex projects into smaller, more manageable steps.',
                'text_es' => 'Divido proyectos complejos en pasos más pequeños y manejables.'
            ],
            [
                'id' => 59,
                'facet_id' => 15,
                'text_en' => 'I organize my work in a way that avoids accumulating pending tasks.',
                'text_es' => 'Organizo mi trabajo de manera que evite la acumulación de tareas pendientes.'
            ],
            [
                'id' => 60,
                'facet_id' => 15,
                'text_en' => 'I struggle to organize my activities, which creates confusion in my time management.',
                'text_es' => 'Me cuesta organizar mis actividades, lo que genera confusión en mi gestión del tiempo.'
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
