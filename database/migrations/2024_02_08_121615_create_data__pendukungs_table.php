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
        Schema::create('data__pendukungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inovasi_pemerintah_daerah_id');
            $table->foreignId('inovasi_masyarakat_id');
            $table->foreignId('indikator_id');
            $table->string('nomor_surat', 100)->nullable();
            $table->string('tanggal_surat', 100)->nullable();
            $table->string('tentang', 100)->nullable();
            $table->string('dokumen', 100)->nullable();
            $table->string('link', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data__pendukungs');
    }
};
