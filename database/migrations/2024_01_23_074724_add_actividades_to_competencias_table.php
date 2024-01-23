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

            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('competencia_id');


            $table->foreign('actividad_id')->references('id')->on('actividades')
            ->onDelete('cascade');
            $table->foreign('competencia_id')->references('id')->on('competencias')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competencias_actividades', function (Blueprint $table) {
            $table->dropForeign('competencias_actividades_actividad_id_foreign');
            $table->dropForeign('competencias_actividades_competencia_id_foreign');

            $table->dropColumn('actividad_id');
            $table->dropColumn('competencia_id');

        });
    }
};
