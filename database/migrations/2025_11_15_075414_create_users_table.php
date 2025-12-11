<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
      public function up()
     { 
       Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('username')->unique();
        $table->string('email')->unique();
        $table->string('password')->nullable(); // karena peserta mungkin belum login
        $table->string('no_hp')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        $table->string('alamat')->nullable();
        $table->string('nik')->nullable();
        $table->timestamps();
        });
     }
      public function down()
     {
        Schema::dropIfExists('users');
     }
};
