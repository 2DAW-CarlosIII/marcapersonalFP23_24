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
        $ciclo = Ciclo::all();
        $user = User::all();
        $randomId_old=0;
        $randomId=1;
        foreach ($user as $user) {
            $numVeces= rand(0, 2);
            for ($i=1; $i <= $numVeces; $i++) {
                while($randomId_old==$randomId){
                $randomId = $ciclo->random()->id;
                }
                $randomId_old=$randomId;
                $user->ciclos()->attach($randomId);
            }
        }
    }
}
