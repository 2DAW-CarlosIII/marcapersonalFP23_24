<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{
    public function run()
    {
        Docente::truncate();
        Docente::factory(10)->create();
    }
}
