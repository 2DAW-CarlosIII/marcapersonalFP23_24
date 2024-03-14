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
        Schema::table('permisos_descargas', function (Blueprint $table) {

            $table->foreign('curriculo_id')->references('id')->on('curriculos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permisos_descargas', function (Blueprint $table) {

            $table->dropForeign('permisos_descargas_curriculo_id_foreign');
            $table->dropForeign('permisos_descargas_empresa_id_foreign');

        });
    }
};
