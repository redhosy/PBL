<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ref_damatkuls', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matakuliah');
            $table->string('nama_matakuliah');
            $table->enum('TP', ['T', 'P', 'T/P'])->comment('Bentuk perkuliahan');
            $table->integer('sks');
            $table->integer('jam');
            $table->integer('sks_teori');
            $table->integer('sks_praktek');
            $table->integer('jam_teori');
            $table->integer('jam_praktek');
            $table->integer('semester');
            $table->integer('id_kurikulum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_damatkuls');
    }
};
