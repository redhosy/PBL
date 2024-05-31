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
        Schema::create('ref_dakurs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kurikulum')->nullable(false);
            $table->string('nama_kurikulum')->nullable(false);
            $table->integer('tahun')->nullable(false);
            $table->integer('id_prodi')->nullable(false);
            $table->enum('status',['1','0'])->default('0')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_dakurs');
    }
};
