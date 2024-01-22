<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_idiomas')->truncate();

        foreach(DB::table('users')->get() as $user) {
            $idiomas = DB::table('idiomas')->get();
            $idioma = $idiomas[rand(0, count($idiomas)-1)];
            DB::table('users_idiomas')->insert([
                'user_id' => $user->id,
                'idioma_id' => $idioma->id,
                'certificado' => rand(0,1),
            ]);
        }
    }
}
