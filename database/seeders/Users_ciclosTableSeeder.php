<?php

namespace Database\Seeders;
use App\Models\User_ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users_ciclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seed de la tabla pivote users_ciclos
        User_ciclo::truncate();
        for ($i=1; $i <= 20; $i++) {
            User_ciclo::create([
                'user_id' => $i,
                'ciclo_id' => $i,
            ]);
        }
    }
}
