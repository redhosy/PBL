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
        Schema::create('berita_acara_soal', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('ruang');
            $table->date('tanggal');
            $table->text('validasi_isi');
            $table->timestamps();

            //foreign key
            $table->foreign('id_matakuliah')->references('id')->on('ref_damatkuls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acara_soal');
    }
};
