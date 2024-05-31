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
            $table->id()->nullable(false);
            $table->string('kode_matakuliah')->default(null);
            $table->string('nama_matakuliah')->default(null);
            $table->enum('TP', ['T', 'P', 'T/P'])->comment('Bentuk perkuliahan');
            $table->integer('sks')->nullable()->default(null);
            $table->integer('jam')->nullable(false);
            $table->integer('sks_teori')->nullable(false);
            $table->integer('sks_praktek')->nullable(false);
            $table->integer('jam_teori')->nullable(false);
            $table->integer('jam_praktek')->nullable(false);
            $table->integer('semester')->nullable()->default(null);
            $table->integer('id_kurikulum')->nullable()->default(null);
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
