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
        Schema::create('verifikasi_soal', function (Blueprint $table) {
            $table->id();
            $table->string('kodeSoal')->unique();
            $table->unsignedBigInteger('id_kodeMatkul');
            $table->unsignedBigInteger('id_dosen');
            $table->string('tanggal');
            $table->string('document');
            $table->unsignedBigInteger('id_smt_thn_akd');
            $table->timestamps();


            // Tambahkan foreign key constraints
            $table->foreign('id_kodeMatkul')->references('id')->on('ref_damatkuls')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('ref_dosens')->onDelete('cascade');
            $table->foreign('id_smt_thn_akd')->references('id')->on('ref_smt_thn_akds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi_soal');
    }
};
