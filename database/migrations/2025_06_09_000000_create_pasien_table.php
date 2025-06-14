<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->text('alamat')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('nik')->nullable()->unique();
            $table->string('nomor_telepon')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Cerai'])->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->integer('pasien_status')->nullable()->default(1); // set default 1
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasien');
    }
};
