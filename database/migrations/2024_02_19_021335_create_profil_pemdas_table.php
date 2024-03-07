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
        Schema::create('profil_pemdas', function (Blueprint $table) {
            $table->id();
            $table->string('tingkatan')->nullable();
            $table->string('opd')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('nama_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_pemdas');
    }
};
