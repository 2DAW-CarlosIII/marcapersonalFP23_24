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
        // Obtener algunos users e idiomas (ajustar según tus necesidades)
        $users = DB::table('users')->pluck('id');
        $idiomas = DB::table('idiomas')->pluck('id');

        // Valores permitidos para la columna 'nivel'
        $valoresPermitidos = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];

        // Insertar datos en la tabla pivote directamente
        foreach ($users as $usuarioId) {
            DB::table('users_idiomas')->insert([
                'user_id' => $usuarioId,
                'idioma_id' => $idiomas->random(),
                'certificado' => true,
                'nivel' => $valoresPermitidos[array_rand($valoresPermitidos)],
            ]);

            DB::table('users_idiomas')->insert([
                'user_id' => $usuarioId,
                'idioma_id' => $idiomas->random(),
                'certificado' => false,
                'nivel' => $valoresPermitidos[array_rand($valoresPermitidos)],
            ]);
        }
    }
}
