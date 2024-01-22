<?php

namespace Database\Seeders;

use App\Models\User_Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users_CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User_Competencia::truncate();

        User_Competencia::factory(10)->create();
    }
}
