<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\Curriculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        // llamadas a otros ficheros de seed
        $this->call(CurriculosTableSeeder::class);
        // llamadas a otros ficheros de seed

        Model::reguard();

        Schema::enableForeignKeyConstraints();
    }

}
