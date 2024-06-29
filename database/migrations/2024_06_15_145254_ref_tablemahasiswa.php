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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id_mhs');
            $table->string('nim', 30)->unique();
            $table->string('nama', 30);
            $table->unsignedBigInteger('id_jurusan')->constrained('ref_jurusans')->on('jurusan')->onDelete('cascade');
            $table->unsignedBigInteger('id_prodi')->constrained('ref_prodis')->on('prodi')->onDelete('cascade');
            $table->tinyInteger('gender')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
