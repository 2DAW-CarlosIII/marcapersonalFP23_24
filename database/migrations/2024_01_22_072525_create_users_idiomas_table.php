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
        Schema::create('users_idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->notNullable();
            $table->foreignId('idioma_id')->constrained('idiomas')->notNullable();
            $table->boolean('certificado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_idiomas');
    }
};
