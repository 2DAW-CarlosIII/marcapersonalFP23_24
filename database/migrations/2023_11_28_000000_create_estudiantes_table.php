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
<<<<<<<<< Temporary merge branch 1
        Schema::create('estudiantes', function($table)
        {
=========
        Schema::create('estudiantes', function (Blueprint $table) {
>>>>>>>>> Temporary merge branch 2
            $table->id();
            $table->string('nombre', 32);
            $table->string('apellidos', 32);
            $table->string('direccion');
            $table->integer('votos')->nullable();
            $table->boolean('confirmado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
