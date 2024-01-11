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
        Schema::create('ciclos', function (Blueprint $table) {
            $table->id();
            $table->char('codCiclo', 6);
            $table->char('codFamilia', 4);
            $table->unsignedBigInteger('familia_id');
            $table->string('grado', 30)->nullable();
            $table->string('nombre', 255);
            $table->timestamps();
            $table->unique(['codFamilia', 'codCiclo']);
            $table->foreign('familia_id')->references('id')->on('familias_profesionales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos');
    }
};
