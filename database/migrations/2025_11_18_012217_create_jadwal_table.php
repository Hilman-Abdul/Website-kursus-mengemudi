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

            // Pertemuan 1
            $table->date('tanggal1');
            $table->time('jam_mulai1');
            $table->time('jam_selesai1');

            // Pertemuan 2 (optional)
            $table->date('tanggal2')->nullable();
            $table->time('jam_mulai2')->nullable();
            $table->time('jam_selesai2')->nullable();

            // Gender user (L / P)
            $table->enum('gender_user', ['L', 'P'])->index();

            // Jenis paket (manual / matic)
            $table->enum('jenis_paket', ['manual', 'matic'])->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
