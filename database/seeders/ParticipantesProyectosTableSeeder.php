<?php

namespace Database\Seeders;

use App\Models\ParticipanteProyecto;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantesProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('participantes_proyectos')->truncate();

        $users = User::all();
        $ultimo_proyecto = null;

        foreach ($users as $user) {

            $numProyectos = rand(0, 2);

            for ($i = 0; $i < $numProyectos; $i++) {

                do {
                    $proyecto_random = Proyecto::all()->random()->id;
                } while ($ultimo_proyecto === $proyecto_random);

                $ultimo_proyecto = $proyecto_random;

                $user->proyectos()->attach($proyecto_random);
            }
        }
    }
}
