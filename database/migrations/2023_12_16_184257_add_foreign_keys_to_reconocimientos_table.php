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
        Schema::table('reconocimientos', function (Blueprint $table) {
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('actividad_id')->references('id')->on('actividades');
            $table->foreign('docente_validador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reconocimientos', function (Blueprint $table) {
            $table->dropForeign('reconocimientos_estudiante_id_foreign');
            $table->dropForeign('reconocimientos_actividad_id_foreign');
            $table->dropForeign('reconocimientos_docente_validador_foreign');
        });
    }
};
