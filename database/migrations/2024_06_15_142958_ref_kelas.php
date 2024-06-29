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
        Schema::create('RefKelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas')->unique();
            $table->string('nama_kelas');
            $table->unsignedBigInteger('id_prodi')->nullable()->constrained('ref_prodis')->on('prodi')->onDelete('cascade');;
            $table->unsignedBigInteger('id_smt_thn_akd')->nullable()->constrained('ref_smt_thn_akd')->on('semester_tahun_akademik')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RefKelas');
    }
};
