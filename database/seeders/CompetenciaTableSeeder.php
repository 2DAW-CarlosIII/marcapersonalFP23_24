<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Seeder;

class CompetenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencia::truncate();
        Competencia::factory(20)->create();
    }
}
