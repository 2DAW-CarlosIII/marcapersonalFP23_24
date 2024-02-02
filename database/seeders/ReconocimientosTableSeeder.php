<?php

namespace Database\Seeders;

use App\Models\Reconocimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReconocimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reconocimiento::truncate();
        Reconocimiento::factory(20)->create();
    }
}
