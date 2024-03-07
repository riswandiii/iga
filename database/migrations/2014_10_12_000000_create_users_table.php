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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opd_id')->nullable();
            $table->foreignId('inisiator_id')->nullable();
            $table->string('nama_lengkap', 20);
            $table->string('nama_panggilan', 15);
            $table->string('email', 20)->unique();
            $table->string('username', 15);
            $table->string('password', 150);
            $table->string('role', 20);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
