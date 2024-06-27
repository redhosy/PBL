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
        Schema::create('ref_matakuliahkbk', function (Blueprint $table) {
            $table->id();
            $table->char('kode_matkul')->unique();
            $table->string('nama_matkul');
            $table->enum('semester',['1','2','3','4','5','6','7','8',]);
            $table->enum('ket',['T','P','T/P']);
            $table->unsignedBigInteger('id_datakbk');
            $table->unsignedBigInteger('id_prodi');
            $table->integer('jumlah_sks');
            $table->unsignedBigInteger('id_dosen');
            $table->timestamps();

            //foreignkey
            $table->foreign('id_datakbk')->references('id')->on('ref_datakbks')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('ref_dosens')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('ref_prodis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_matakuliahkbk');
    }
};
