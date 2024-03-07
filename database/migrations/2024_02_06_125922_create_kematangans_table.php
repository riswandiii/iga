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
        Schema::create('kematangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inovasi_pemerintah_daerah_id');
            $table->foreignId('inovasi_masyarakat_id');
            $table->foreignId('indikator_id');
            $table->foreignId('parameter_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematangans');
    }
};
