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
        Schema::create('users_competencias', function (Blueprint $table) {
            $table->user_id()->foreign('id')->references('id')->on('users');
            $table->competencia_id()->foreign('competencia_id')->references('id')->on('competencias');
            $table->char('docente_validador', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_competencias');
    }
};
