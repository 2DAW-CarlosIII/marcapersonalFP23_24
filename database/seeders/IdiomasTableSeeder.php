<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idioma;
use App\Models\User;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Idioma::truncate();
        foreach (self::$Idiomas as $idioma){
            $newIdiom = new Idioma();
            $newIdiom->nombre = $idioma;
            $newIdiom->save();

        }
        foreach(User::)
        $user->idiomas()->attach($Id, ['certificado' => false]);
    }

    private static $Idiomas = ["Spanish","English","Portuguese"];
}
