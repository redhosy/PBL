<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ref_dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->unique();
            $table->string('nip')->unique();
            $table->string('gender');
            $table->unsignedBigInteger('id_jurusan')->nullable()->constrained('ref_jurusans')->on('jurusan')->onDelete('cascade');
            $table->unsignedBigInteger('id_prodi')->nullable()->constrained('ref_prodis')->on('prodi')->onDelete('cascade');
            $table->string('email')->unique();
            $table->enum('status', ['0','1'])->default('1');
            $table->timestamps();

            //foreignkey
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_dosens');
    }
};
