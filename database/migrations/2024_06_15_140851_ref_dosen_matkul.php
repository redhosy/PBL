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
        Schema::create('RefDosenMatkul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_matakuliah')->nullable()->constrained('ref_matakuliah')->on('nama_matakuliah')->onDelete('cascade');
            $table->unsignedBigInteger('id_dosen')->nullable()->constrained('ref_dosens')->on('nama')->onDelete('cascade');
            $table->unsignedBigInteger('id_kelas')->nullable()->constrained('ref_kelas')->on('nama_kelas')->onDelete('cascade');
            $table->unsignedBigInteger('id_smt_thn_akd')->nullable()->constrained('ref_smt_thn_akd')->on('semester_tahun_akademik')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RefDosenMatkul');
    }
};
