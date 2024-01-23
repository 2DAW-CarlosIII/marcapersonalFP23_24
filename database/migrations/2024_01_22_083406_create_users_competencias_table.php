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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('competencia_id');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->unsignedBigInteger('docente_validador')->nullable();
            $table->foreign('docente_validador')->references('id')->on('users');
            $table->primary(['user_id', 'competencia_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_competencias', function (Blueprint $table) {
            $table->dropForeign('users_competencias_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('users_competencias_competencia_id_foreign');
            $table->dropColumn('competencia_id');
            $table->dropForeign('users_competencias_docente_validador_foreign');
            $table->dropColumn('docente_validador');
        });
        Schema::dropIfExists('users_competencias');
    }
};
