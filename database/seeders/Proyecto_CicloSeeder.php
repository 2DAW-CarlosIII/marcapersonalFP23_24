<?php

namespace Database\Seeders;

use App\Models\Proyecto_Ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Proyecto_CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto_Ciclo::truncate();
        Proyecto_Ciclo::factory(20)->create();
    }
}
