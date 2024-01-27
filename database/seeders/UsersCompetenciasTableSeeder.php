<?php

namespace Database\Seeders;

use App\Models\UserCompetencia;
use App\Models\User;
use App\Models\Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersCompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCompetencia::truncate();

        $users = User::all();
        $competencias = Competencia::all();

        foreach ($users as $user) {
            $ncompetencias = random_int(0,2);
            for ($i=0; $i < $ncompetencias; $i++) {
                $competencia = $competencias->random();
                while ($user->competencias->contains($competencia)) {
                    $competencia = $competencias->random();
                }
                $user->competencias()->attach($competencia->id);
            }
        }
    }
}
