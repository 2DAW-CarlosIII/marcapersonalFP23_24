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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['domain', 'facet']);
            $table->unsignedBigInteger('trait_id'); // ID del dominio o faceta
            $table->decimal('score', 5, 2); // Puntaje calculado
            $table->decimal('percentile', 5, 2)->nullable(); // Percentil (opcional)
            $table->timestamps();
            
            // Índices para mejorar rendimiento
            $table->index('assessment_id');
            $table->index('user_id');
            $table->index(['type', 'trait_id']);
            
            // Un resultado único por tipo/rasgo para cada evaluación
            $table->unique(['assessment_id', 'type', 'trait_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
