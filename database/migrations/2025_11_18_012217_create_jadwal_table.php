<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();

            // Relasi User
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal1');
            $table->time('jam_mulai1');
            $table->time('jam_selesai1');
            $table->date('tanggal2')->nullable();
            $table->time('jam_mulai2')->nullable();
            $table->time('jam_selesai2')->nullable();
            $table->enum('gender_user', ['L', 'P'])->index();
            $table->enum('jenis_paket', ['manual', 'matic'])->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
