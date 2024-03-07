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
        Schema::create('inovasi__pemerintah__daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_inovasi', 100);
            $table->foreignId('user_id');
            $table->foreignId('tahapan_inovasi_id');
            $table->foreignId('inisiator_inovasi_daerah_id');
            $table->foreignId('jenis_inovasi_id');
            $table->foreignId('bentuk_inovasi_daerah_id');
            $table->foreignId('tematik_id');
            $table->string('detil_tematik', 30);
            $table->foreignId('urusan_utama_id');
            $table->foreignId('urusan_lain_id');
            $table->date('waktu_uji_coba');
            $table->date('waktu_penerapan');
            $table->text('rancang_bangun');
            $table->text('tujuan_inovasi');
            $table->text('manfaat_diperoleh');
            $table->text('hasil_inovasi');
            $table->string('anggaran', 100)->nullable();
            $table->string('profil_bisnis', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasi__pemerintah__daerahs');
    }
};
