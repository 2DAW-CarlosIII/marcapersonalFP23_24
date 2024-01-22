<?php

namespace Database\Seeders;

use App\Models\User_competencia;
use App\Models\Users_competencia;
use Database\Factories\User_competenciasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users_CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User_competencia::truncate();
        User_competencia::factory(20)->create();
    }
}
