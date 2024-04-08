<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'admin',
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);

        if(env('APP_DEBUG') === true) {
            // Crear 10 usuarios con el estado docente
            User::factory(10)->docente()->create();
            // Crear 30 usuarios con el estado estudiante
            User::factory(30)->estudiante()->create();
            return;
        }


    }
}
