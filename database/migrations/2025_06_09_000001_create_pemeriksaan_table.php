<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanTable extends Migration
{
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->uuid('pasien_uuid'); // FK ke pasien.uuid
            $table->uuid('pemeriksaan_uuid')->unique();
            $table->date('tanggal_pemeriksaan');
            $table->text('keluhan')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('tindakan')->nullable();
            $table->uuid('pemeriksa_uuid')->nullable(); // sesuai fillable, UUID pemeriksa
            $table->string('pemeriksa_name')->nullable();
            $table->integer('pemeriksaan_status')->nullable()->default(1); // kalau status string
            $table->timestamps();

            $table->foreign('pasien_uuid')->references('uuid')->on('pasien')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemeriksaan');
    }
}
