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
        Schema::create('dosenkbk', function (Blueprint $table) {
            $table->id();
            $table->string('Nama Dosen');
            $table->string('Jurusan');
            $table->foreign('Jurusan')->references('kode_jurusan')->on('ref_jurusans');
            $table->string('Prodi');
            $table->foreign('Prodi')->references('kode_prodi')->on('ref_prodis');
            $table->string('Email');
            $table->enum('Status',['1','0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosenkbk');
    }
};
