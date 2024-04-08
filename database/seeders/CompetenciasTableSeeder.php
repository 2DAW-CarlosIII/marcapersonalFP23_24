<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencia::truncate();
        // a cada competencia se le asignará un color consecutivo, comenzando con el negro e incrementando el valor del color hasta el blanco, dando la vuelta a toda la gama de colores
        $pasoColor = (256 * 256 * 256) / count(self::$competencias);

        for ($i = 0; $i < count(self::$competencias) ; $i++) {
            $competencia = self::$competencias[$i];
            $c = new Competencia;
            $c->nombre = $competencia;
            $c->color = "#" . str_pad(dechex($i * $pasoColor), 6, "0", STR_PAD_LEFT);
            $c->save();
        }
    }

private static $competencias = [
'PLANIFICACIÓN',
'FLEXIBILIDAD',
'COMUNICACIÓN',
'LIDERAZGO',
'COMPROMISO',
'NEGOCIACIÓN',
'ORIENTACIÓN AL CLIENTE',
'ADAPTABILIDAD',
'ORGANIZACIÓN',
'AUTOMOTIVACIÓN',
'ANÁLISIS DE PROBLEMAS',
'AUTOCONOCIMIENTO',
'ESPÍRITU COMERCIAL',
'ASUNCIÓN DE RIESGOS',
'AUTOCONFIANZA',
'ESCUCHA',
'TOLERANCIA AL ESTRÉS',
'AUTOCONTROL',
'CAPACIDAD CRÍTICA',
'RESOLUCIÓN DE CONFLICTOS',
'ORIENTACIÓN AL LOGRO',
'SOCIABILIDAD',
'TRABAJO EN EQUIPO',
'INTELIGENCIA EMOCIONAL',
'DELEGACIÓN',
'CREATIVIDAD',
'ORIENTACIÓN ESTRATÉGICA',
'AUTONOMÍA',
'DECISIÓN',
'NETWORKING',
'PERSUASIÓN',
'INTEGRIDAD',
'INICIATIVA',
'AMABILIDAD',
'GESTIÓN',
'EMPATIA',
'TENACIDAD',
'AUTOCRÍTICA',
'DISCRECIÓN',
'PROACTIVIDAD',
'GESTIÓN DEL TIEMPO',
'FACILIDAD APRENDIZAJE',
'ASERTIVIDAD',
'SÍNTESIS',
];


}