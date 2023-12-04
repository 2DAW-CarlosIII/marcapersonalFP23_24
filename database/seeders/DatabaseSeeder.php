<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estudiante;
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

        $this->call(EstudiantesTableSeeder::class);
        $this->call(ActividadesTableSeeder::class);

        // \App\Models\User::factory(10)->create();
<<<<<<< HEAD
        $this->call(ReconocimientosTableSeeder::class);
=======
        $this->call(DocentesTableSeeder::class);
>>>>>>> ejerciciosBBDDdocentes

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);
        Model::reguard();

        Schema::enableForeignKeyConstraints();



    }
}
