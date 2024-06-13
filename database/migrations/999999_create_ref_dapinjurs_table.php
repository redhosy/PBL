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
        Schema::create('ref_dapinjurs', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->foreignId('id_jabatan_pimpinan')->constrained('jabpims');
            $table->foreignId('id_jurusan')->constrained('ref_jurusans');
            $table->foreignId('id_dosen')->constrained('ref_dosens');
            $table->string('periode')->nullable(false);
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_dapinjurs');
    }
};
