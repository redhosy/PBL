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
        Schema::create('matkul_k_b_ks', function (Blueprint $table) {
            $table->id();
            $table->string('KodeMatkul')->unique();
            $table->string('Nama');
            $table->integer('Jumlahsks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul_k_b_ks');
    }
};
