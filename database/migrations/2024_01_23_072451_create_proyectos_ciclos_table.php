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
        Schema::create('proyectos_ciclos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('ciclo_id');

            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->primary(['proyecto_id', 'ciclo_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_ciclos');
    }
};
