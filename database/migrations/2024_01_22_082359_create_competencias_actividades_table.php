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
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('actividad_id');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('actividad_id')->references('id')->on('actividades');

            $table->timestamps();
        });
    }

//$table->foreing(dovente_validador)->references(id)
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias_actividades');
    }
};
