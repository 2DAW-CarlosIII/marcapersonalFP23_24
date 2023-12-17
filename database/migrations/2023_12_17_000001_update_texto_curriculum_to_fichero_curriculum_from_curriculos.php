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
        Schema::table('curriculos', function (Blueprint $table) {
            $table->dropColumn('texto_curriculum');
            $table->string('archivo_curriculum', 255)->after('video_curriculum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculos', function (Blueprint $table) {
            $table->mediumText('texto_curriculum')->nullable();
            $table->dropColumn('archivo_curriculum');
        });
    }
};