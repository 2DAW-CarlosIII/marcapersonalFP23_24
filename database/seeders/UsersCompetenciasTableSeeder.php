<?php

namespace Database\Seeders;

use App\Models\User_competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCompetenciasTableSeeder extends Seeder
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
