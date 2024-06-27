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
        Schema::create('ref_dapinprods', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->unsignedBigInteger('id_jabatan_pimpinan')->constrained('jabpims')->on('jabatan_pimpinan')->onDelete('cascade');
            $table->unsignedBigInteger('id_prodi')->constrained('ref_prodis')->on('prodi')->onDelete('cascade');
            $table->unsignedBigInteger('id_dosen')->constrained('ref_dosens')->on('nama')->onDelete('cascade');
            $table->string('periode');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_dapinprods');
    }
};
