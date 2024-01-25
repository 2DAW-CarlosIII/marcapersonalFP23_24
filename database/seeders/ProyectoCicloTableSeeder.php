<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\ProyectoCiclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoCicloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProyectoCiclo::truncate();
        ProyectoCiclo::factory(20)->create();
    }
}
