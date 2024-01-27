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
        ParticipanteProyecto::truncate();
        $users = User::all();
        for($i = 0; $i < count($users); $i++){

            $userProyects = random_int(0,2);

            for($iterator = 0; $iterator < $userProyects; $iterator++){
                $participante = new ParticipanteProyecto([
                    "estudiante_id"=>$users[$i]->id,
                    "proyecto_id"=>User::inRandomOrder()->first()->id,
                ]);

                $participante->save();
            }

        }
    }
}
