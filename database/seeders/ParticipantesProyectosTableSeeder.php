<?php

namespace Database\Seeders;
use App\Models\ParticipanteProyecto;
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

            $userProyects = random_int(0,2);

            for($iterator = 0; $iterator < $userProyects; $iterator++){

                $user->proyectos()->attach(User::inRandomOrder()->first()->id);
            }

        }



    }
}
