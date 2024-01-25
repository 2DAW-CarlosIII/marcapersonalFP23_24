<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idiomas')->truncate();
        foreach (self::$idiomas as $idioma) {
            DB::table('idiomas')->insert([
                'nombre' => $idioma,
            ]);
        }
        $this->command->info('¡Tabla idiomas inicializada con datos!');
    }

    private static $idiomas = [
        'Español',
        'Inglés',
        'Francés',
        'Alemán',
        'Portugués',
        'Italiano',
        'Chino',
        'Japonés',
        'Ruso',
        'Árabe',
        'Coreano',
        'Hindi',
    ];
}
