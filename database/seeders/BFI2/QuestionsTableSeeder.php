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
            // Pregunta 1 - Sociability (Facet 1)
            [
                'id' => 1,
                'facet_id' => 1,
                'text_en' => 'I am someone who is outgoing, sociable.',
                'text_es' => 'Soy alguien extrovertido y sociable.'
            ],
            // Pregunta 2 - Compassion (Facet 4)
            [
                'id' => 2,
                'facet_id' => 4,
                'text_en' => 'I am someone who is compassionate, has a soft heart.',
                'text_es' => 'Soy alguien compasivo, con un corazón sensible.'
            ],
            // Pregunta 3 - Organization (Facet 7)
            [
                'id' => 3,
                'facet_id' => 7,
                'text_en' => 'I am someone who tends to be disorganized.',
                'text_es' => 'Soy alguien que tiende a ser desorganizado.'
            ],
            // Pregunta 4 - Anxiety (Facet 10)
            [
                'id' => 4,
                'facet_id' => 10,
                'text_en' => 'I am someone who remains calm in tense situations.',
                'text_es' => 'Soy alguien que permanece tranquilo en situaciones tensas.'
            ],
            // Pregunta 5 - Aesthetic Sensitivity (Facet 14)
            [
                'id' => 5,
                'facet_id' => 14,
                'text_en' => 'I am someone who has few artistic interests.',
                'text_es' => 'Soy alguien con pocos intereses artísticos.'
            ],
            // Pregunta 6 - Assertiveness (Facet 2)
            [
                'id' => 6,
                'facet_id' => 2,
                'text_en' => 'I am someone who has an assertive personality.',
                'text_es' => 'Soy alguien con una personalidad asertiva.'
            ],
            // Pregunta 7 - Respectfulness (Facet 5)
            [
                'id' => 7,
                'facet_id' => 5,
                'text_en' => 'I am someone who is respectful, treats others with respect.',
                'text_es' => 'Soy alguien respetuoso, trata a los demás con respeto.'
            ],
            // Pregunta 8 - Productiveness (Facet 8)
            [
                'id' => 8,
                'facet_id' => 8,
                'text_en' => 'I am someone who tends to be lazy.',
                'text_es' => 'Soy alguien que tiende a ser perezoso.'
            ],
            // Pregunta 9 - Depression (Facet 11)
            [
                'id' => 9,
                'facet_id' => 11,
                'text_en' => 'I am someone who stays optimistic after experiencing a setback.',
                'text_es' => 'Soy alguien que se mantiene optimista después de experimentar un revés.'
            ],
            // Pregunta 10 - Intellectual Curiosity (Facet 13)
            [
                'id' => 10,
                'facet_id' => 13,
                'text_en' => 'I am someone who is curious about many different things.',
                'text_es' => 'Soy alguien curioso sobre muchas cosas diferentes.'
            ],
            // Pregunta 11 - Energy Level (Facet 3)
            [
                'id' => 11,
                'facet_id' => 3,
                'text_en' => 'I am someone who rarely feels excited or eager.',
                'text_es' => 'Soy alguien que raramente se siente emocionado o entusiasmado.'
            ],
            // Pregunta 12 - Trust (Facet 6)
            [
                'id' => 12,
                'facet_id' => 6,
                'text_en' => 'I am someone who is suspicious of others\' intentions.',
                'text_es' => 'Soy alguien que desconfía de las intenciones de los demás.'
            ],
            // Pregunta 13 - Responsibility (Facet 9)
            [
                'id' => 13,
                'facet_id' => 9,
                'text_en' => 'I am someone who is reliable, can always be counted on.',
                'text_es' => 'Soy alguien confiable, siempre se puede contar conmigo.'
            ],
            // Pregunta 14 - Emotional Volatility (Facet 12)
            [
                'id' => 14,
                'facet_id' => 12,
                'text_en' => 'I am someone who tends to feel upset easily.',
                'text_es' => 'Soy alguien que tiende a molestarse con facilidad.'
            ],
            // Pregunta 15 - Creative Imagination (Facet 15)
            [
                'id' => 15,
                'facet_id' => 15,
                'text_en' => 'I am someone who is original, comes up with new ideas.',
                'text_es' => 'Soy alguien original, se me ocurren ideas nuevas.'
            ],
            // Pregunta 16 - Sociability (Facet 1)
            [
                'id' => 16,
                'facet_id' => 1,
                'text_en' => 'I am someone who keeps to myself.',
                'text_es' => 'Soy alguien reservado.'
            ],
            // Pregunta 17 - Compassion (Facet 4)
            [
                'id' => 17,
                'facet_id' => 4,
                'text_en' => 'I am someone who can be cold and uncaring.',
                'text_es' => 'Soy alguien que puede ser frío e indiferente.'
            ],
            // Pregunta 18 - Organization (Facet 7)
            [
                'id' => 18,
                'facet_id' => 7,
                'text_en' => 'I am someone who keeps things neat and tidy.',
                'text_es' => 'Soy alguien que mantiene las cosas limpias y ordenadas.'
            ],
            // Pregunta 19 - Anxiety (Facet 10)
            [
                'id' => 19,
                'facet_id' => 10,
                'text_en' => 'I am someone who worries a lot.',
                'text_es' => 'Soy alguien que se preocupa mucho.'
            ],
            // Pregunta 20 - Aesthetic Sensitivity (Facet 14)
            [
                'id' => 20,
                'facet_id' => 14,
                'text_en' => 'I am someone who values art and beauty.',
                'text_es' => 'Soy alguien que valora el arte y la belleza.'
            ],
            // Pregunta 21 - Assertiveness (Facet 2)
            [
                'id' => 21,
                'facet_id' => 2,
                'text_en' => 'I am someone who tends to be dominant.',
                'text_es' => 'Soy alguien que tiende a ser dominante.'
            ],
            // Pregunta 22 - Respectfulness (Facet 5)
            [
                'id' => 22,
                'facet_id' => 5,
                'text_en' => 'I am someone who starts arguments with others.',
                'text_es' => 'Soy alguien que inicia discusiones con otros.'
            ],
            // Pregunta 23 - Productiveness (Facet 8)
            [
                'id' => 23,
                'facet_id' => 8,
                'text_en' => 'I am someone who has difficulty getting started on tasks.',
                'text_es' => 'Soy alguien que tiene dificultad para comenzar tareas.'
            ],
            // Pregunta 24 - Depression (Facet 11)
            [
                'id' => 24,
                'facet_id' => 11,
                'text_en' => 'I am someone who feels blue, down.',
                'text_es' => 'Soy alguien que se siente melancólico, decaído.'
            ],
            // Pregunta 25 - Intellectual Curiosity (Facet 13)
            [
                'id' => 25,
                'facet_id' => 13,
                'text_en' => 'I am someone who has little interest in abstract ideas.',
                'text_es' => 'Soy alguien que tiene poco interés en ideas abstractas.'
            ],
            // Pregunta 26 - Energy Level (Facet 3)
            [
                'id' => 26,
                'facet_id' => 3,
                'text_en' => 'I am someone who is less active than other people.',
                'text_es' => 'Soy alguien menos activo que otras personas.'
            ],
            // Pregunta 27 - Trust (Facet 6)
            [
                'id' => 27,
                'facet_id' => 6,
                'text_en' => 'I am someone who assumes the best about people.',
                'text_es' => 'Soy alguien que asume lo mejor de las personas.'
            ],
            // Pregunta 28 - Responsibility (Facet 9)
            [
                'id' => 28,
                'facet_id' => 9,
                'text_en' => 'I am someone who can be somewhat careless.',
                'text_es' => 'Soy alguien que puede ser algo descuidado.'
            ],
            // Pregunta 29 - Emotional Volatility (Facet 12)
            [
                'id' => 29,
                'facet_id' => 12,
                'text_en' => 'I am someone who keeps their emotions under control.',
                'text_es' => 'Soy alguien que mantiene sus emociones bajo control.'
            ],
            // Pregunta 30 - Creative Imagination (Facet 15)
            [
                'id' => 30,
                'facet_id' => 15,
                'text_en' => 'I am someone who has difficulty imagining things.',
                'text_es' => 'Soy alguien que tiene dificultad para imaginar cosas.'
            ],
            // Pregunta 31 - Sociability (Facet 1)
            [
                'id' => 31,
                'facet_id' => 1,
                'text_en' => 'I am someone who is talkative.',
                'text_es' => 'Soy alguien hablador.'
            ],
            // Pregunta 32 - Compassion (Facet 4)
            [
                'id' => 32,
                'facet_id' => 4,
                'text_en' => 'I am someone who is helpful and unselfish with others.',
                'text_es' => 'Soy alguien servicial y desinteresado con los demás.'
            ],
            // Pregunta 33 - Organization (Facet 7)
            [
                'id' => 33,
                'facet_id' => 7,
                'text_en' => 'I am someone who is systematic, likes to keep things in order.',
                'text_es' => 'Soy alguien sistemático, me gusta mantener las cosas en orden.'
            ],
            // Pregunta 34 - Anxiety (Facet 10)
            [
                'id' => 34,
                'facet_id' => 10,
                'text_en' => 'I am someone who is easily stressed.',
                'text_es' => 'Soy alguien que se estresa con facilidad.'
            ],
            // Pregunta 35 - Aesthetic Sensitivity (Facet 14)
            [
                'id' => 35,
                'facet_id' => 14,
                'text_en' => 'I am someone who is fascinated by art, music, or literature.',
                'text_es' => 'Soy alguien fascinado por el arte, la música o la literatura.'
            ],
            // Pregunta 36 - Assertiveness (Facet 2)
            [
                'id' => 36,
                'facet_id' => 2,
                'text_en' => 'I am someone who prefers to have others take charge.',
                'text_es' => 'Soy alguien que prefiere que otros tomen el mando.'
            ],
            // Pregunta 37 - Respectfulness (Facet 5)
            [
                'id' => 37,
                'facet_id' => 5,
                'text_en' => 'I am someone who is sometimes rude to others.',
                'text_es' => 'Soy alguien que a veces es grosero con los demás.'
            ],
            // Pregunta 38 - Productiveness (Facet 8)
            [
                'id' => 38,
                'facet_id' => 8,
                'text_en' => 'I am someone who is efficient, gets things done.',
                'text_es' => 'Soy alguien eficiente, consigue hacer las cosas.'
            ],
            // Pregunta 39 - Depression (Facet 11)
            [
                'id' => 39,
                'facet_id' => 11,
                'text_en' => 'I am someone who often feels sad.',
                'text_es' => 'Soy alguien que a menudo se siente triste.'
            ],
            // Pregunta 40 - Intellectual Curiosity (Facet 13)
            [
                'id' => 40,
                'facet_id' => 13,
                'text_en' => 'I am someone who loves to read challenging material.',
                'text_es' => 'Soy alguien que ama leer material desafiante.'
            ],
            // Pregunta 41 - Energy Level (Facet 3)
            [
                'id' => 41,
                'facet_id' => 3,
                'text_en' => 'I am someone who is full of energy.',
                'text_es' => 'Soy alguien lleno de energía.'
            ],
            // Pregunta 42 - Trust (Facet 6)
            [
                'id' => 42,
                'facet_id' => 6,
                'text_en' => 'I am someone who suspects hidden motives in others.',
                'text_es' => 'Soy alguien que sospecha de motivos ocultos en los demás.'
            ],
            // Pregunta 43 - Responsibility (Facet 9)
            [
                'id' => 43,
                'facet_id' => 9,
                'text_en' => 'I am someone who is dependable, steady.',
                'text_es' => 'Soy alguien fiable, constante.'
            ],
            // Pregunta 44 - Emotional Volatility (Facet 12)
            [
                'id' => 44,
                'facet_id' => 12,
                'text_en' => 'I am someone who is emotionally stable, not easily upset.',
                'text_es' => 'Soy alguien emocionalmente estable, no se altera con facilidad.'
            ],
            // Pregunta 45 - Creative Imagination (Facet 15)
            [
                'id' => 45,
                'facet_id' => 15,
                'text_en' => 'I am someone who has little creativity.',
                'text_es' => 'Soy alguien con poca creatividad.'
            ],
            // Pregunta 46 - Sociability (Facet 1)
            [
                'id' => 46,
                'facet_id' => 1,
                'text_en' => 'I am someone who is outgoing, sociable.',
                'text_es' => 'Soy alguien extrovertido y sociable.'
            ],
            // Pregunta 47 - Compassion (Facet 4)
            [
                'id' => 47,
                'facet_id' => 4,
                'text_en' => 'I am someone who feels little sympathy for others.',
                'text_es' => 'Soy alguien que siente poca simpatía por los demás.'
            ],
            // Pregunta 48 - Organization (Facet 7)
            [
                'id' => 48,
                'facet_id' => 7,
                'text_en' => 'I am someone who leaves a mess, doesn\'t clean up.',
                'text_es' => 'Soy alguien que deja desorden, no limpia.'
            ],
            // Pregunta 49 - Anxiety (Facet 10)
            [
                'id' => 49,
                'facet_id' => 10,
                'text_en' => 'I am someone who rarely feels anxious or afraid.',
                'text_es' => 'Soy alguien que raramente se siente ansioso o temeroso.'
            ],
            // Pregunta 50 - Aesthetic Sensitivity (Facet 14)
            [
                'id' => 50,
                'facet_id' => 14,
                'text_en' => 'I am someone who thinks poetry and plays are boring.',
                'text_es' => 'Soy alguien que piensa que la poesía y el teatro son aburridos.'
            ],
            // Pregunta 51 - Assertiveness (Facet 2)
            [
                'id' => 51,
                'facet_id' => 2,
                'text_en' => 'I am someone who finds it hard to influence people.',
                'text_es' => 'Soy alguien que encuentra difícil influir en las personas.'
            ],
            // Pregunta 52 - Respectfulness (Facet 5)
            [
                'id' => 52,
                'facet_id' => 5,
                'text_en' => 'I am someone who is polite, courteous to others.',
                'text_es' => 'Soy alguien educado, cortés con los demás.'
            ],
            // Pregunta 53 - Productiveness (Facet 8)
            [
                'id' => 53,
                'facet_id' => 8,
                'text_en' => 'I am someone who is persistent, works until the task is finished.',
                'text_es' => 'Soy alguien persistente, trabaja hasta terminar la tarea.'
            ],
            // Pregunta 54 - Depression (Facet 11)
            [
                'id' => 54,
                'facet_id' => 11,
                'text_en' => 'I am someone who rarely feels depressed.',
                'text_es' => 'Soy alguien que raramente se siente deprimido.'
            ],
            // Pregunta 55 - Intellectual Curiosity (Facet 13)
            [
                'id' => 55,
                'facet_id' => 13,
                'text_en' => 'I am someone who avoids intellectual discussions.',
                'text_es' => 'Soy alguien que evita discusiones intelectuales.'
            ],
            // Pregunta 56 - Energy Level (Facet 3)
            [
                'id' => 56,
                'facet_id' => 3,
                'text_en' => 'I am someone who shows a lot of enthusiasm.',
                'text_es' => 'Soy alguien que muestra mucho entusiasmo.'
            ],
            // Pregunta 57 - Trust (Facet 6)
            [
                'id' => 57,
                'facet_id' => 6,
                'text_en' => 'I am someone who trusts others.',
                'text_es' => 'Soy alguien que confía en los demás.'
            ],
            // Pregunta 58 - Responsibility (Facet 9)
            [
                'id' => 58,
                'facet_id' => 9,
                'text_en' => 'I am someone who sometimes behaves irresponsibly.',
                'text_es' => 'Soy alguien que a veces se comporta de manera irresponsable.'
            ],
            // Pregunta 59 - Emotional Volatility (Facet 12)
            [
                'id' => 59,
                'facet_id' => 12,
                'text_en' => 'I am someone who changes my mood a lot.',
                'text_es' => 'Soy alguien que cambia de humor a menudo.'
            ],
            // Pregunta 60 - Creative Imagination (Facet 15)
            [
                'id' => 60,
                'facet_id' => 15,
                'text_en' => 'I am someone who is inventive, finds clever ways to do things.',
                'text_es' => 'Soy alguien inventivo, encuentra formas inteligentes de hacer las cosas.'
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
