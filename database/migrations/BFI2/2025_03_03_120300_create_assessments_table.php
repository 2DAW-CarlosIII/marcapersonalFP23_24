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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['in_progress', 'completed', 'abandoned'])->default('in_progress');
            $table->string('language', 10)->default('en'); // Para determinar el idioma elegido (en/es)
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            // Índice para buscar evaluaciones por usuario
            $table->index('user_id');
            // Índice para filtrar por estado
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
