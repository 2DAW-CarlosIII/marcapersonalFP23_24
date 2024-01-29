<?php

namespace Database\Seeders;

use App\Models\ParticipanteProyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Proyecto;

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
        foreach ($users as $user) {
            $user->proyectos()->attach($proyectos->random(rand(0, 2))->pluck('id'));
        }
    }
}
