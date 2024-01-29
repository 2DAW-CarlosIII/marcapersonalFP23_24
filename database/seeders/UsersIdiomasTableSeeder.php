<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Idioma;
use App\Models\User;

class UsersIdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_idiomas')->truncate();
        $nivel = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];

        $users = User::all();
        $idiomas = Idioma::all();

        foreach ($users as $user) {
            $num_idiomas = rand(0, 2);

            for ($i = 0; $i < $num_idiomas; $i++) {
                $idioma = $idiomas->random();

                if (!$user->idiomas->contains($idioma)) {
                    $user->idiomas()->attach($idioma->id, [
                        'nivel' => rand(1, 5),
                        'certificado' => rand(0, 1),
                    ]);
                }
            }
        }
    }
}
