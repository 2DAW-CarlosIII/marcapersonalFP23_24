<?php

namespace Database\Seeders;
use App\Models\ParticipanteProyecto;
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
        ParticipanteProyecto::factory(5)->create();
    }
}
