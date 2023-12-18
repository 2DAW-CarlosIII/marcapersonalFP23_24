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
            $table->string('reconocimientoIMG')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reconocimientos', function (Blueprint $table) {
            $table->dropColumn('reconocimientoIMG');
        });
    }
};
