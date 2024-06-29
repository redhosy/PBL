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
        Schema::create('ref_dosenkbk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dosen');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_datakbk');
            $table->unsignedBigInteger('id_jabatan');
            $table->string('email')->unique();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('id_dosen')->references('id')->on('ref_dosens')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id')->on('ref_jurusans')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('ref_prodis')->onDelete('cascade');
            $table->foreign('id_datakbk')->references('id')->on('ref_datakbks')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id')->on('jabpims')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_dosenkbk');
    }
};
