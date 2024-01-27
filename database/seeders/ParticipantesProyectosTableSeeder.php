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
        foreach($users as $user){

            $proyectosSeleccionados = Proyecto::all()->random(random_int(0,2));

            $sonProyectosDiferentes = false;

            if(count($proyectosSeleccionados) == 2){
                do{

                    if($proyectosSeleccionados->get(0)->id !== $proyectosSeleccionados->get(1)->id){
                        $sonProyectosDiferentes = true;
                    }

                }while(!$sonProyectosDiferentes);
            }

            $user->proyectos()->attach($proyectosSeleccionados);

        }



    }
}
