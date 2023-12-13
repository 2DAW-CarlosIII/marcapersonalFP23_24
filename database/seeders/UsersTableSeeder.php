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

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'nombre' => env('ADMIN_NOMBRE', 'administrador'),
            'apellidos' => env('ADMIN_APELLIDOS', 'todopoderoso'),
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);

        User::factory(10)->create();
    }
}
