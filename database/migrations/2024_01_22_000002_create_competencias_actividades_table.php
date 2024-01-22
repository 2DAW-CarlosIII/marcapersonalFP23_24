<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competencias_actividades', function (Blueprint $table) {
            $table->foreignId('actividad_id')->constrained()->onDelete('cascade');
            $table->foreignId('competencia_id')->constrained()->onDelete('cascade');
            $table->primary(['actividad_id', 'competencia_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias_actividades');
    }
};
