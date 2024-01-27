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
        array_map(function($value){
            $userProyects = random_int(0,2);
            for($i = 0; $i < $userProyects; $i++){
                $participante = new ParticipanteProyecto(
                    [
                        "estudiante_id"=>$value->id,
                        "proyecto_id"=>Proyecto::inRandomOrder()->get()->id,
                    ]
                );
                $participante->save();
            }

        },User::all()->toArray());
    }
}
