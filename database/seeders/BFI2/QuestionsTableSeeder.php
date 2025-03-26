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
                'text_en' => 'When my educational center implements a new digital system or learning platform, I feel comfortable adapting to these unexpected changes.',
                'text_es' => 'Cuando mi centro educativo implementa un nuevo sistema digital o plataforma de aprendizaje, me siento cómodo/a adaptándome a estos cambios inesperados.'
            ],
            [
                'id' => 2,
                'facet_id' => 1,
                'text_en' => 'If a teacher or supervisor changes the work methodology in the middle of the course (for example, from individual to group work), I adapt easily even if it means stepping out of my comfort zone.',
                'text_es' => 'Si un profesor o supervisor cambia la metodología de trabajo a mitad de curso (por ejemplo, de individual a grupal), me adapto con facilidad aunque implique salir de mi zona de confort.'
            ],
            [
                'id' => 3,
                'facet_id' => 1,
                'text_en' => 'When new tools or applications are introduced in my studies or work, I see this as a motivating opportunity to acquire new skills.',
                'text_es' => 'Cuando se introducen nuevas herramientas o aplicaciones en mis estudios o trabajo, veo esto como una oportunidad motivadora para adquirir nuevas habilidades.'
            ],
            [
                'id' => 4,
                'facet_id' => 1,
                'text_en' => 'If my group of friends or colleagues proposes activities or plans different from the usual ones, I tend to prefer to stick with what I know because novelty makes me uncomfortable.',
                'text_es' => 'Si mi grupo de amigos o compañeros propone actividades o planes diferentes a los habituales, suelo preferir mantenerme en lo conocido porque me incomoda la novedad.'
            ],

            // Facet 2: Flexibility
            [
                'id' => 5,
                'facet_id' => 2,
                'text_en' => 'When a new social network or popular app appears among my friends, I learn to use it quickly and without needing much external help.',
                'text_es' => 'Cuando aparece una nueva red social o aplicación popular entre mis amigos, aprendo a usarla de forma rápida y sin necesitar mucha ayuda externa.'
            ],
            [
                'id' => 6,
                'facet_id' => 2,
                'text_en' => 'If the requirements or deadlines change during a project or group work, I can reorganize my priorities without getting frustrated.',
                'text_es' => 'Si durante un proyecto o trabajo grupal cambian los requisitos o fechas de entrega, puedo reorganizar mis prioridades sin frustrarme.'
            ],
            [
                'id' => 7,
                'facet_id' => 2,
                'text_en' => 'When a teacher, colleague, or supervisor gives me suggestions about my work, I accept that feedback and use it constructively to improve.',
                'text_es' => 'Cuando un profesor, compañero o supervisor me da sugerencias sobre mi trabajo, acepto ese feedback y lo utilizo constructivamente para mejorar.'
            ],
            [
                'id' => 8,
                'facet_id' => 2,
                'text_en' => 'If something unexpected happens that alters my study or work plans (such as a power outage or an unexpected meeting), I struggle to reorganize my tasks and remain productive.',
                'text_es' => 'Si surge un imprevisto que altera mis planes de estudio o trabajo (como un corte de luz o una reunión inesperada), me cuesta reorganizar mis tareas y seguir siendo productivo/a.'
            ],

            // Facet 3: Resilience
            [
                'id' => 9,
                'facet_id' => 3,
                'text_en' => 'When I face an unexpected problem with my technology (such as losing an important file), I look for solutions calmly instead of stressing out.',
                'text_es' => 'Cuando me enfrento a un problema inesperado con mi tecnología (como la pérdida de un archivo importante), busco soluciones de forma calmada en lugar de estresarme.'
            ],
            [
                'id' => 10,
                'facet_id' => 3,
                'text_en' => 'If my educational center changes a system that was comfortable for me, I can find positive aspects in the new system and see it as an opportunity to learn.',
                'text_es' => 'Si mi centro educativo cambia un sistema que me resultaba cómodo, puedo encontrar aspectos positivos en el nuevo sistema y verlo como una oportunidad para aprender.'
            ],
            [
                'id' => 11,
                'facet_id' => 3,
                'text_en' => 'During pressure situations like surprise exams or short-notice deliveries, I maintain control and concentration without getting blocked.',
                'text_es' => 'Durante situaciones de presión como exámenes sorpresa o entregas con poco tiempo, mantengo el control y la concentración sin bloquearme.'
            ],
            [
                'id' => 12,
                'facet_id' => 3,
                'text_en' => 'When my daily routine is altered by unforeseen circumstances (such as changes in schedules or transportation), I find it very difficult to adapt and maintain my performance.',
                'text_es' => 'Cuando mi rutina diaria se ve alterada por circunstancias imprevistas (como cambios en horarios o transportes), me resulta muy difícil adaptarme y mantener mi rendimiento.'
            ],

            // Domain 2: Effective Communication
            // Facet 4: Expression Clarity
            [
                'id' => 13,
                'facet_id' => 4,
                'text_en' => 'When I have to present a project in class or explain a complex topic to my colleagues, I can organize my ideas clearly and communicate them effectively.',
                'text_es' => 'Cuando tengo que presentar un proyecto en clase o explicar un tema complejo a mis compañeros, puedo organizar mis ideas claramente y comunicarlas con eficacia.'
            ],
            [
                'id' => 16,
                'facet_id' => 4,
                'text_en' => 'During group discussions or presentations, I often find myself struggling to express my thoughts coherently, even when I know what I want to say.',
                'text_es' => 'Durante discusiones grupales o presentaciones, a menudo me encuentro con dificultades para expresar mis pensamientos de forma coherente, incluso cuando sé lo que quiero decir.'
            ],
            [
                'id' => 19,
                'facet_id' => 4,
                'text_en' => 'When explaining a difficult concept to classmates or friends, I use practical examples from everyday life to make the information more accessible.',
                'text_es' => 'Cuando explico un concepto difícil a compañeros o amigos, utilizo ejemplos prácticos de la vida cotidiana para hacer la información más accesible.'
            ],
            [
                'id' => 24,
                'facet_id' => 4,
                'text_en' => 'I find it challenging to adjust how I communicate the same information when speaking to different audiences (for example, explaining the same topic to professors versus friends).',
                'text_es' => 'Me resulta desafiante ajustar cómo comunico la misma información cuando hablo con diferentes audiencias (por ejemplo, explicar el mismo tema a profesores versus amigos).'
            ],

            // Facet 5: Active Listening
            [
                'id' => 14,
                'facet_id' => 5,
                'text_en' => 'During a study session or meeting, I pay full attention to what others are saying rather than just waiting for my turn to speak.',
                'text_es' => 'Durante una sesión de estudio o reunión, presto total atención a lo que dicen los demás en lugar de solo esperar mi turno para hablar.'
            ],
            [
                'id' => 20,
                'facet_id' => 5,
                'text_en' => 'In group chats or discussions, I often cut others off mid-sentence or type my response before they\'ve finished making their point.',
                'text_es' => 'En chats o discusiones grupales, suelo interrumpir a otros a mitad de frase o escribir mi respuesta antes de que hayan terminado de exponer su punto.'
            ],
            [
                'id' => 21,
                'facet_id' => 5,
                'text_en' => 'When discussing controversial topics with friends or classmates, I make sure to fully understand their perspective before responding with my own view.',
                'text_es' => 'Cuando discuto temas controvertidos con amigos o compañeros de clase, me aseguro de entender completamente su perspectiva antes de responder con mi propio punto de vista.'
            ],
            [
                'id' => 23,
                'facet_id' => 5,
                'text_en' => 'During online classes or video calls, I make a conscious effort not to interrupt others, even when the conversation has delays or overlaps.',
                'text_es' => 'Durante clases online o videollamadas, hago un esfuerzo consciente por no interrumpir a los demás, incluso cuando la conversación tiene retrasos o solapamientos.'
            ],

            // Facet 6: Communication Adaptability
            [
                'id' => 15,
                'facet_id' => 6,
                'text_en' => 'I adjust my language and communication style when explaining the same concept to different people (for example, a technical concept to a classmate with expertise versus someone without background knowledge).',
                'text_es' => 'Ajusto mi lenguaje y estilo de comunicación cuando explico un mismo concepto a diferentes personas (por ejemplo, un concepto técnico a un compañero con experiencia versus alguien sin conocimientos previos).'
            ],
            [
                'id' => 17,
                'facet_id' => 6,
                'text_en' => 'When I don\'t understand instructions for an assignment or project, I immediately ask for clarification rather than proceeding with uncertainty.',
                'text_es' => 'Cuando no entiendo las instrucciones para una tarea o proyecto, inmediatamente pido aclaraciones en lugar de proceder con incertidumbre.'
            ],
            [
                'id' => 18,
                'facet_id' => 6,
                'text_en' => 'I feel confident speaking up in class discussions or making presentations to my peers, even on topics I\'m not entirely comfortable with.',
                'text_es' => 'Me siento seguro/a participando en debates de clase o haciendo presentaciones ante mis compañeros, incluso sobre temas con los que no estoy completamente familiarizado/a.'
            ],
            [
                'id' => 22,
                'facet_id' => 6,
                'text_en' => 'Even in heated discussions or disagreements with classmates or teammates, I maintain a respectful tone and avoid using offensive language.',
                'text_es' => 'Incluso en discusiones acaloradas o desacuerdos con compañeros de clase o equipo, mantengo un tono respetuoso y evito usar lenguaje ofensivo.'
            ],

            // Domain 3: Critical Thinking and Problem Solving
            // Facet 7: Information Analysis
            [
                'id' => 25,
                'facet_id' => 7,
                'text_en' => 'Before coming to conclusions about information I find online or on social media, I take time to verify facts and consider the reliability of the source.',
                'text_es' => 'Antes de sacar conclusiones sobre información que encuentro en internet o redes sociales, me tomo tiempo para verificar hechos y considerar la fiabilidad de la fuente.'
            ],
            [
                'id' => 27,
                'facet_id' => 7,
                'text_en' => 'When a friend shares a news article or viral content, I question its accuracy and look for additional sources before accepting or sharing it myself.',
                'text_es' => 'Cuando un amigo comparte un artículo de noticias o contenido viral, cuestiono su precisión y busco fuentes adicionales antes de aceptarlo o compartirlo yo mismo/a.'
            ],
            [
                'id' => 28,
                'facet_id' => 7,
                'text_en' => 'I tend to accept statistics or "facts" presented in class or on social media without questioning how the data was collected or whether it might be biased.',
                'text_es' => 'Tiendo a aceptar estadísticas o "hechos" presentados en clase o en redes sociales sin cuestionar cómo se recopilaron los datos o si podrían estar sesgados.'
            ],
            [
                'id' => 32,
                'facet_id' => 7,
                'text_en' => 'When choosing between options (like which course to take or which topic to research), I usually make quick decisions based on first impressions rather than thoroughly analyzing alternatives.',
                'text_es' => 'Al elegir entre opciones (como qué curso tomar o qué tema investigar), normalmente tomo decisiones rápidas basadas en primeras impresiones en lugar de analizar a fondo las alternativas.'
            ],

            // Facet 8: Creative Problem-Solving
            [
                'id' => 29,
                'facet_id' => 8,
                'text_en' => 'When analyzing a case study or complex scenario in class, I can identify both the strengths and limitations of different approaches.',
                'text_es' => 'Al analizar un caso de estudio o escenario complejo en clase, puedo identificar tanto las fortalezas como las limitaciones de diferentes enfoques.'
            ],
            [
                'id' => 30,
                'facet_id' => 8,
                'text_en' => 'When facing a difficult problem in a project or assignment, I can come up with innovative solutions that others might not have considered.',
                'text_es' => 'Cuando me enfrento a un problema difícil en un proyecto o tarea, puedo proponer soluciones innovadoras que otros podrían no haber considerado.'
            ],
            [
                'id' => 33,
                'facet_id' => 8,
                'text_en' => 'When a group project isn\'t working well, I try to understand the root causes of the issues rather than just implementing quick fixes that don\'t address the underlying problems.',
                'text_es' => 'Cuando un proyecto grupal no funciona bien, intento entender las causas raíz de los problemas en lugar de implementar soluciones rápidas que no abordan los problemas de fondo.'
            ],
            [
                'id' => 36,
                'facet_id' => 8,
                'text_en' => 'When making choices about my education or social activities, I rarely think through how my decisions might impact my future opportunities or relationships.',
                'text_es' => 'Cuando tomo decisiones sobre mi educación o actividades sociales, rara vez reflexiono sobre cómo mis decisiones podrían impactar en mis oportunidades futuras o relaciones.'
            ],

            // Facet 9: Decision-Making
            [
                'id' => 26,
                'facet_id' => 9,
                'text_en' => 'Before choosing a course, joining a club, or making other significant decisions, I evaluate multiple options and their potential outcomes.',
                'text_es' => 'Antes de elegir un curso, unirme a un club o tomar otras decisiones importantes, evalúo múltiples opciones y sus posibles resultados.'
            ],
            [
                'id' => 31,
                'facet_id' => 9,
                'text_en' => 'When my study group or project team is divided on how to proceed, I consider everyone\'s input before forming my own position on what we should do.',
                'text_es' => 'Cuando mi grupo de estudio o equipo de proyecto está dividido sobre cómo proceder, considero las aportaciones de todos antes de formar mi propia posición sobre lo que deberíamos hacer.'
            ],
            [
                'id' => 34,
                'facet_id' => 9,
                'text_en' => 'When deciding whether to participate in social activities versus studying, I consider both the immediate enjoyment and the longer-term consequences for my academic goals.',
                'text_es' => 'Al decidir si participar en actividades sociales o estudiar, considero tanto el disfrute inmediato como las consecuencias a largo plazo para mis objetivos académicos.'
            ],
            [
                'id' => 35,
                'facet_id' => 9,
                'text_en' => 'Even when I feel strongly about an issue in a group discussion or project, I try to evaluate the situation objectively rather than letting my emotions drive my decisions.',
                'text_es' => 'Incluso cuando siento fuertes emociones sobre un tema en una discusión grupal o proyecto, intento evaluar la situación objetivamente en lugar de dejar que mis emociones guíen mis decisiones.'
            ],

            // Domain 4: Teamwork and Collaboration
            // Facet 10: Team Integration
            [
                'id' => 37,
                'facet_id' => 10,
                'text_en' => 'I find group projects and collaborative assignments more engaging and fulfilling than working independently on tasks.',
                'text_es' => 'Encuentro los proyectos grupales y tareas colaborativas más interesantes y satisfactorios que trabajar independientemente.'
            ],
            [
                'id' => 40,
                'facet_id' => 10,
                'text_en' => 'When given the choice between a group project or an individual assignment with the same learning objectives, I typically prefer to work alone.',
                'text_es' => 'Cuando me dan a elegir entre un proyecto grupal o una tarea individual con los mismos objetivos de aprendizaje, normalmente prefiero trabajar solo/a.'
            ],
            [
                'id' => 42,
                'facet_id' => 10,
                'text_en' => 'In team settings, I can adapt to taking different roles (such as leader, organizer, or creative contributor) depending on what the group needs at the moment.',
                'text_es' => 'En entornos de equipo, puedo adaptarme a desempeñar diferentes roles (como líder, organizador o contribuyente creativo) dependiendo de lo que el grupo necesite en cada momento.'
            ],
            [
                'id' => 47,
                'facet_id' => 10,
                'text_en' => 'In collaborative projects, I consistently complete my assigned parts on time and to a high standard, understanding that others are depending on my contribution.',
                'text_es' => 'En proyectos colaborativos, completo consistentemente las partes que me corresponden a tiempo y con un alto estándar, entendiendo que otros dependen de mi contribución.'
            ],

            // Facet 11: Perspective Respect
            [
                'id' => 38,
                'facet_id' => 11,
                'text_en' => 'When a classmate or teammate proposes an approach that differs from what I had in mind, I genuinely consider their perspective before advocating for my own ideas.',
                'text_es' => 'Cuando un compañero de clase o de equipo propone un enfoque diferente al que yo tenía en mente, considero genuinamente su perspectiva antes de defender mis propias ideas.'
            ],
            [
                'id' => 44,
                'facet_id' => 11,
                'text_en' => 'During group discussions for projects or assignments, I tend to dismiss ideas from teammates that don\'t align with my own vision or approach.',
                'text_es' => 'Durante discusiones grupales para proyectos o tareas, tiendo a descartar ideas de compañeros que no se alinean con mi propia visión o enfoque.'
            ],
            [
                'id' => 45,
                'facet_id' => 11,
                'text_en' => 'I express myself honestly in team settings while being mindful of how my communication style and words might impact others\' feelings and willingness to contribute.',
                'text_es' => 'Me expreso honestamente en entornos de equipo mientras soy consciente de cómo mi estilo de comunicación y palabras podrían impactar en los sentimientos de los demás y su disposición a contribuir.'
            ],
            [
                'id' => 48,
                'facet_id' => 11,
                'text_en' => 'When conflicts arise in a study group or project team, I struggle to help the group find middle ground or solutions that incorporate different viewpoints.',
                'text_es' => 'Cuando surgen conflictos en un grupo de estudio o equipo de proyecto, me cuesta ayudar al grupo a encontrar un punto medio o soluciones que incorporen diferentes puntos de vista.'
            ],

            // Facet 12: Supportive Behavior
            [
                'id' => 39,
                'facet_id' => 12,
                'text_en' => 'When disagreements emerge in group projects, I actively work to find fair solutions that address everyone\'s concerns rather than just pushing for my preferred outcome.',
                'text_es' => 'Cuando surgen desacuerdos en proyectos grupales, trabajo activamente para encontrar soluciones justas que aborden las preocupaciones de todos en lugar de simplemente presionar por mi resultado preferido.'
            ],
            [
                'id' => 41,
                'facet_id' => 12,
                'text_en' => 'When I have knowledge or information that could help my classmates or teammates with their part of a project, I proactively share it rather than keeping it to myself.',
                'text_es' => 'Cuando tengo conocimientos o información que podría ayudar a mis compañeros de clase o equipo con su parte de un proyecto, la comparto proactivamente en lugar de guardármela.'
            ],
            [
                'id' => 43,
                'facet_id' => 12,
                'text_en' => 'When a teammate is struggling with their part of a group assignment, I offer encouragement and practical help rather than just focusing on my own responsibilities.',
                'text_es' => 'Cuando un compañero de equipo tiene dificultades con su parte de una tarea grupal, ofrezco ánimo y ayuda práctica en lugar de centrarme solo en mis propias responsabilidades.'
            ],
            [
                'id' => 46,
                'facet_id' => 12,
                'text_en' => 'In collaborative environments, I\'m comfortable asking for assistance when I need it and equally willing to help others when they reach out with questions.',
                'text_es' => 'En entornos colaborativos, me siento cómodo/a pidiendo ayuda cuando la necesito y estoy igualmente dispuesto/a a ayudar a otros cuando me preguntan.'
            ],

            // Domain 5: Time Management and Organization
            // Facet 13: Planning and Prioritization
            [
                'id' => 49,
                'facet_id' => 13,
                'text_en' => 'Before starting a major assignment or studying for exams, I create a clear plan detailing what I need to do and when I\'ll do it.',
                'text_es' => 'Antes de comenzar un trabajo importante o estudiar para exámenes, creo un plan claro detallando qué necesito hacer y cuándo lo haré.'
            ],
            [
                'id' => 51,
                'facet_id' => 13,
                'text_en' => 'When I have multiple assignments due around the same time, I can identify which tasks are most urgent or important and address them in an effective order.',
                'text_es' => 'Cuando tengo múltiples tareas que entregar aproximadamente al mismo tiempo, puedo identificar qué tareas son más urgentes o importantes y abordarlas en un orden efectivo.'
            ],
            [
                'id' => 53,
                'facet_id' => 13,
                'text_en' => 'I consistently submit assignments on time without needing last-minute extensions or reminders from instructors or teammates.',
                'text_es' => 'Entrego consistentemente mis tareas a tiempo sin necesitar prórrogas de última hora o recordatorios de instructores o compañeros de equipo.'
            ],
            [
                'id' => 56,
                'facet_id' => 13,
                'text_en' => 'When faced with multiple academic and social commitments, I struggle to determine which activities should take priority in my schedule.',
                'text_es' => 'Cuando me enfrento a múltiples compromisos académicos y sociales, me cuesta determinar qué actividades deberían tener prioridad en mi agenda.'
            ],

            // Facet 14: Task Execution
            [
                'id' => 52,
                'facet_id' => 14,
                'text_en' => 'I often find myself cramming the night before deadlines or exams because I\'ve postponed my work until the last possible moment.',
                'text_es' => 'A menudo me encuentro estudiando intensivamente la noche antes de las fechas límite o exámenes porque he pospuesto mi trabajo hasta el último momento posible.'
            ],
            [
                'id' => 54,
                'facet_id' => 14,
                'text_en' => 'When studying or working on assignments, I put my phone on silent or in another room to maintain focus and avoid social media distractions.',
                'text_es' => 'Cuando estudio o trabajo en tareas, pongo mi teléfono en silencio o en otra habitación para mantener la concentración y evitar distracciones de redes sociales.'
            ],
            [
                'id' => 57,
                'facet_id' => 14,
                'text_en' => 'I arrive on time for classes, meetings, and scheduled study sessions with classmates, respecting others\' time and the commitments I\'ve made.',
                'text_es' => 'Llego a tiempo a clases, reuniones y sesiones de estudio programadas con compañeros, respetando el tiempo de los demás y los compromisos que he adquirido.'
            ],
            [
                'id' => 58,
                'facet_id' => 14,
                'text_en' => 'While working on a long-term project or studying for major exams, I regularly check my progress to ensure I\'m on track and adjust my approach if needed.',
                'text_es' => 'Mientras trabajo en un proyecto a largo plazo o estudio para exámenes importantes, reviso regularmente mi progreso para asegurarme de que voy por buen camino y ajusto mi enfoque si es necesario.'
            ],

            // Facet 15: Organization
            [
                'id' => 50,
                'facet_id' => 15,
                'text_en' => 'I use digital or physical tools (such as planners, calendar apps, or to-do lists) to keep track of deadlines, appointments, and tasks.',
                'text_es' => 'Utilizo herramientas digitales o físicas (como agendas, aplicaciones de calendario o listas de tareas) para hacer un seguimiento de fechas límite, citas y tareas.'
            ],
            [
                'id' => 55,
                'facet_id' => 15,
                'text_en' => 'When working on a complicated assignment or project, I break it down into smaller, manageable tasks with their own sub-deadlines.',
                'text_es' => 'Cuando trabajo en una tarea o proyecto complicado, lo divido en tareas más pequeñas y manejables con sus propias fechas límite intermedias.'
            ],
            [
                'id' => 59,
                'facet_id' => 15,
                'text_en' => 'I keep my study materials, notes, and digital files organized in a way that allows me to quickly find what I need without wasting time searching.',
                'text_es' => 'Mantengo mis materiales de estudio, notas y archivos digitales organizados de manera que me permite encontrar rápidamente lo que necesito sin perder tiempo buscando.'
            ],
            [
                'id' => 60,
                'facet_id' => 15,
                'text_en' => 'My approach to organizing coursework and study materials is often chaotic, making it difficult to locate specific information or resources when I need them.',
                'text_es' => 'Mi enfoque para organizar los trabajos del curso y materiales de estudio es a menudo caótico, lo que dificulta localizar información o recursos específicos cuando los necesito.'
            ],
        ];

        DB::table('questions')->truncate();

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
