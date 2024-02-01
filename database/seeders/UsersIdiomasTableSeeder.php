<?php

namespace Database\Seeders;

use App\Models\Idioma;
use App\Models\User;
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
        $idiomas = Idioma::all();
        $users = User::all();
        foreach($users as $user) {
            $cantidad = rand(0, 2);
            for ($i=0; $i < $cantidad; $i++) {
                $idioma = $idiomas[rand(0, count($idiomas)-1)];
                while($user->idiomas->contains($idioma)) {
                    $idioma = $idiomas[rand(0, count($idiomas)-1)];
                }
                $user->idiomas()->attach($idioma->id, [
                    'nivel' => $nivel[rand(0, count($nivel)-1)],
                    'certificado' => rand(0,1),
                ]);
            }
        }
    }
}
