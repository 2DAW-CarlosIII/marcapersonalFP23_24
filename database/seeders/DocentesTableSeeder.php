<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DocentesTableSeeder extends Seeder
{

    public function run(): void
    {
        Docente::truncate();
        \App\Models\Docente::factory(10)->create();
    }
}
