<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_kursus', function (Blueprint $table) {
            $table->id();

            // relasi ke user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // data paket
            $table->string('nama_paket');
            $table->integer('harga_paket');
            $table->string('waktu_pertemuan'); // contoh: "10x60 Menit"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_kursus');
    }
};
