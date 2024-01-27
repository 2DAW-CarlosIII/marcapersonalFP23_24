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
        $proyectos = Proyecto::all();
        foreach($users as $user){

            $proyectosSeleccionados = $proyectos->random(random_int(0,2));

            $sonProyectosDiferentes = false;

            if(count($proyectosSeleccionados) == 2){
                do{

                    if($proyectosSeleccionados->get(0)->id !== $proyectosSeleccionados->get(1)->id){
                        $sonProyectosDiferentes = true;
                    }else{
                        $proyectosSeleccionados->set(0)->id = $proyectos->random()->id;
                    }

                }while(!$sonProyectosDiferentes);
            }

            $user->proyectos()->attach($proyectosSeleccionados);

        }



    }
}
