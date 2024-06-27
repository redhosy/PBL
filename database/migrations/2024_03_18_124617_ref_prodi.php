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
            $table->id()->nullable(false);
            $table->string('kode_prodi')->unique();
            $table->string('prodi');
            $table->unsignedBigInteger('id_jurusan')->constrained('ref_jurusans')->on('jurusan')->onDelete('cascade');
            $table->string('id_jenjang');
            $table->timestamps();

            //foreignkey

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
