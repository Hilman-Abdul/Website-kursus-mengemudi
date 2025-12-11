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

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('nama_paket');
            $table->integer('harga_paket');
            $table->string('waktu_pertemuan');

            // TAMBAHKAN INI
            $table->string('jenis_paket'); // manual / matic

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_kursus');
    }
};
