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
        //$this->call(EstudiantesTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        /*\App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);*/

        //self::seedProyectos();
        //$this->command->info('Tabla catálogo inicializada con datos!');

        $this->call(DocentesTableSeeder::class);

        Model::reguard();

        Schema::enableForeignKeyConstraints();
    }

    /*private static function seedProyectos(): void
    {
        Proyecto::truncate();
        foreach( self::$arrayProyectos as $proyecto ) {
            $p = new Proyecto;
            $p->docente_id = $proyecto['docente_id'];
            $p->nombre = $proyecto['nombre'];
            $p->dominio = $proyecto['dominio'];
            $p->metadatos = serialize($proyecto['metadatos']);
            $p->save();
        }
    }*/
}
