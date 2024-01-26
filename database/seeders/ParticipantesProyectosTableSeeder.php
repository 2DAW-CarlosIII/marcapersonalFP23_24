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

        $amountElementsToInsert = random_int(0,2);

        for($i = 0; $i < $amountElementsToInsert; $i++){
            $participanteProyecto = new ParticipanteProyecto(
                [
                    "estudiante_id"=>User::inRandomOrder()->first()->id,
                    "proyecto_id"=> Proyecto::inRandomOrder()->first()->id,
                ]
            );
            $participanteProyecto->save();
        }
    }
}
