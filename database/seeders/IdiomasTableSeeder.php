<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idioma;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Idioma::truncate();
        foreach (self::$idiomas as $idioma){
            $newIdiom = new Idioma();
            $newIdiom->nombre = $idioma;
            $newIdiom->save();

        }
    }

    private static $idiomas = array(
        "Español",
        "Inglés",
        "Francés",
        "Alemán",
        "Italiano",
        "Portugués",
        "Chino",
        "Japonés",
        "Coreano",
        "Árabe"
    );
}
