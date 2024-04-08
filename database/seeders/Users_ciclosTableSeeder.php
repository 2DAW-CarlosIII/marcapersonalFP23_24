<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\Estudiante;
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
        $ciclo = Ciclo::all();
        $user = Estudiante::all();
        $randomId_old=0;
        foreach ($user as $user) {
            $numVeces= ceil(rand(1, 15) / 14);
            for ($i=1; $i <= $numVeces; $i++) {
                do{
                    $randomId = $ciclo->random()->id;
                }while($randomId_old==$randomId);
                $randomId_old=$randomId;
                $user->ciclos()->attach($randomId);
            }
        }
    }
}
