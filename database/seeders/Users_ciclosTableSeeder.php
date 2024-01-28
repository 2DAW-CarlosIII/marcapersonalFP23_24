<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\User;
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

        $users = User::all();
        $ciclos = Ciclo::all();

        foreach ($users as $user) {
            $numCiclos = random_int(0, 2);
            for ($i = 0; $i < $numCiclos; $i++) {
                $ciclo = $ciclos->random()->id;
                $user->ciclos()->attach($ciclo);
            }
        }
    }
}
