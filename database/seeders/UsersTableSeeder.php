<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::truncate();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => env('ADMIN_EMAIL', 'admin@email.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
        ]);
        \App\Models\User::factory(10)->create();
    }
}
