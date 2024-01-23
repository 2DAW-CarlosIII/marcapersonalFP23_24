<?php

namespace Database\Seeders;

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

        foreach(DB::table('users')->get() as $user) {
            $idiomas = DB::table('idiomas')->get();
            $idioma = $idiomas[rand(0, count($idiomas)-1)];
            DB::table('users_idiomas')->insert([
                'user_id' => $user->id,
                'idioma_id' => $idioma->id,
                'nivel' => $nivel[rand(0, count($nivel)-1)],
                'certificado' => rand(0,1),
            ]);
        }
    }
}
