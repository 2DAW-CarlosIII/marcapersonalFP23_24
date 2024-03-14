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
        Schema::create('permisos_descargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculo_id');
            $table->unsignedBigInteger('empresa_id');
            $table->boolean('validado')->nullable();
            $table->timestamps();

            $table->foreign('curriculo_id')->references('id')->on('curriculos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos_descargas');
    }

    /*curriculo_id: será clave ajena de la tabla curriculos e indicará el Curriculo que se pretende descargar,
empresa_id: será clave ajena de la tabla de users e indicará el usuario que ha solicitado la descarga del Curriculo
validado: este atributo será NULL cuando la Empresa solicita la visualización de un Curriculo, mientras que tendrá true cuando el  Estudiante haya otorgado a la Empresa el derecho a la descarga.
La tabla anterior llevará, para mayor sencillez, los atributos id y los correspondientes a los timestamps.*/
};
