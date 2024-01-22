<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competencia;

class CompetenciasTableSeeder extends Seeder
{

        private static $arrayCompetencias = [
            [
                'nombre' => 'Competencia 1',
                'color' => 'verde',
            ],
            [
                'nombre' => 'Competencia 2',
                'color' => 'rojo',
            ],
            [
                'nombre' => 'Competencia 3',
                'color' => 'azul',
            ],
        ];

        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            Competencia::truncate();

            foreach (self::$arrayCompetencias as $competencia) {
                $comp = new Competencia;
                $comp->nombre = $competencia['nombre'];
                $comp->color = $competencia['color'];
                $comp->save();
            }
        }

    }

