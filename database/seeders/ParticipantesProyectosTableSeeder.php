<?php

namespace Database\Seeders;
use App\Models\ParticipanteProyecto;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantesProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate en la tabla para eliminar datos previos
        ParticipanteProyecto::truncate();

        // coje todos los estudiantes y proyectos
        $estudiantes = User::all();
        $proyectos = Proyecto::all();

        // Para cada estudiante, asignar 0, 1 o 2 proyectos aleatorios
        foreach ($estudiantes as $estudiante) {
            $proyectosAleatorios = $proyectos->random(rand(0, 2));
            foreach ($proyectosAleatorios as $proyecto) {
                ParticipanteProyecto::firstOrCreate([
                    'estudiante_id' => $estudiante->id,
                    'proyecto_id' => $proyecto->id,
                ]);
            }
        }
    }
}
