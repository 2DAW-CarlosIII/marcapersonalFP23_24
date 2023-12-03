<?php

namespace Database\Seeders;


use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteTableSeeder extends Seeder
{
    public function run()
    {
        Estudiante::truncate();
        Estudiante::factory(10)->create();
    }
}
