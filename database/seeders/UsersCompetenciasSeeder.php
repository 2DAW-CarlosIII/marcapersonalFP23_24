<?php

namespace Database\Seeders;

use App\Models\UsersCompetencia;
use Illuminate\Database\Seeder;

class UsersCompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersCompetencia::truncate();

        UsersCompetencia::factory(10)->create();

    }
}
