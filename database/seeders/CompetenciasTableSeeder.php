<?php

namespace Database\Seeders;

use App\Models\Competencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencias::truncate();
        Competencias::factory(10)->create();
    }
}
