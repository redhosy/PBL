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
            $table->string('kode_kurikulum');
            $table->string('nama_kurikulum');
            $table->integer('tahun');
            $table->unsignedBigInteger('id_prodi')->nullable()->constrained('ref_prodis')->on('prodi')->onDelete('cascade');
            $table->enum('status',['1','0'])->default('0');
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
