<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\User;
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

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);

        $this->call(EstudiantesTableSeeder::class);
        $this->call(ReconocimientosTableSeeder::class);
        $this->call(DocentesTableSeeder::class);
        $this->call(CurriculosTableSeeder::class);
        $this->call(ActividadesTableSeeder::class);

        self::seedUsers();
        $this->command->info('Tabla usuarios inicializada con datos!');

        self::seedProyectos();
        $this->command->info('Tablas inicializadas con datos!');

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }

private function seedUsers()
{

    $usuarios = [
        [
            'name' => 'NombreUsuario1',
            'apellidos' => 'ApellidosUsuario1',
            'email' => 'usuario1@example.com',
            'password' => bcrypt('contraseña1'),
        ],
        [
            'name' => 'NombreUsuario2',
            'apellidos' => 'ApellidosUsuario2',
            'email' => 'usuario2@example.com',
            'password' => bcrypt('contraseña2'),
        ],

    ];

        // Inserta los usuarios en la base de datos
        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }

}

    private static function seedProyectos(): void
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
    }
    private static $arrayProyectos = [
        [
            'docente_id' => 1,
            'nombre' => 'Tecnologías de la Información',
            'dominio' => 'TecnologiaInformacion',
            'metadatos' => [
                'fecha_inicio' => '2023-01-15',
                'fecha_fin' => '2023-05-30',
                'calificacion' => 9.5
            ]
        ],
        [
            'docente_id' => 1,
            'nombre' => 'Diseño Gráfico',
            'dominio' => 'DisenyoGrafico',
            'metadatos' => [
                'fecha_inicio' => '2023-02-10',
                'fecha_fin' => '2023-06-20',
                'calificacion' => 4.0
            ]
        ],
        [
            'docente_id' => 2,
            'nombre' => 'Electrónica',
            'dominio' => 'Electronica',
            'metadatos' => [
                'fecha_inicio' => '2023-03-05',
                'fecha_fin' => '2023-07-15',
                'calificacion' => 9.2
            ]
        ],
        [
            'docente_id' => 2,
            'nombre' => 'Ingeniería Civil',
            'dominio' => 'IngenieriaCivil',
            'metadatos' => [
                'fecha_inicio' => '2023-04-20',
                'fecha_fin' => '2023-08-25',
                'calificacion' => 7.8
            ]
        ],
        [
            'docente_id' => 3,
            'nombre' => 'Gastronomía',
            'dominio' => 'Gastronomia',
            'metadatos' => [
                'fecha_inicio' => '2023-05-10',
                'fecha_fin' => '2023-09-30',
                'calificacion' => 8.5
            ]
        ],
        [
            'docente_id' => 3,
            'nombre' => 'Medicina',
            'dominio' => 'Medicina',
            'metadatos' => [
                'fecha_inicio' => '2023-06-15',
                'fecha_fin' => '2023-10-30',
                'calificacion' => 9.0
            ]
        ],
        [
            'docente_id' => 3,
            'nombre' => 'Mecatrónica',
            'dominio' => 'Mecatronica',
            'metadatos' => [
                'fecha_inicio' => '2023-07-10',
                'fecha_fin' => '2023-11-20',
                'calificacion' => 8.7
            ]
        ],
        [
            'docente_id' => 4,
            'nombre' => 'Arquitectura',
            'dominio' => 'Arquitectura',
            'metadatos' => [
                'fecha_inicio' => '2023-08-05',
                'fecha_fin' => '2023-12-15',
                'calificacion' => 8.9
            ]
        ],
        [
            'docente_id' => 4,
            'nombre' => 'Automoción',
            'dominio' => 'Automocion',
            'metadatos' => [
                'fecha_inicio' => '2023-09-10',
                'fecha_fin' => '2024-01-20',
                'calificacion' => 8.2
            ]
        ],
        [
            'docente_id' => 4,
            'nombre' => 'Turismo',
            'dominio' => 'Turismo',
            'metadatos' => [
                'fecha_inicio' => '2023-10-15',
                'fecha_fin' => '2024-02-28',
                'calificacion' => 9.4
            ]
        ],
    ];
}

