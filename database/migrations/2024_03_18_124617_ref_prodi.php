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
        Schema::create('ref_prodis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_prodi')->unique();
            $table->string('prodi');
            $table->integer('id_jurusan');
            $table->string('id_jenjang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_prodis');
    }
};
