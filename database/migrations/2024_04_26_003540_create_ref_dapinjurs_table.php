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
            $table->id()->nullable(false);;
            $table->integer('id_jabatan_pimpinan')->nullable(false);
            $table->integer('id_jurusan')->nullable(false);
            $table->integer('id_dosen')->nullable(false);
            $table->string('periode')->nullable(false);
            $table->enum('status',['1','0'])->default('0');
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
