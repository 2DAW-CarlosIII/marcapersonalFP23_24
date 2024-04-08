<?php

namespace Database\Seeders;

use App\Models\Idioma;
use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersIdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_idiomas')->truncate();
        $nivel = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        $users = Estudiante::all();
        foreach($users as $user) {
            $cantidad = rand(0, 2);
            for ($i=0; $i < $cantidad; $i++) {
                do {
                    $idioma = Idioma::where('alpha2', self::$idiomas[rand(0, count(self::$idiomas)-1)])->first();
                } while(
                    $user->belongsToMany(Idioma::class, 'users_idiomas', 'user_id', 'idioma_id')
                    ->wherePivot('idioma_id', $idioma->id)->count()
                     > 0
                );
                $user->idiomas()->attach($idioma->id, [
                    'nivel' => $nivel[rand(0, count($nivel)-1)],
                    'certificado' => rand(0,1),
                ]);
            }
        }
    }

    private static $idiomas = [
        'en', 'en', 'en', 'en', 'en', 'fr', 'fr', 'de', 'it', 'pt'
    ];

}
