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
        Schema::create('r_p_s', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream
=======
            $table->string('KodeRPS')->unique();
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_KodeMatkul');
            $table->string('Dokumen')->nullable();
            $table->date('Tanggal');
            $table->unsignedBigInteger('id_smt_thn_akd')->constrained('ref_smt_thn_akds');
>>>>>>> Stashed changes
            $table->timestamps();

            // Tambahkan foreign key constraints
            $table->foreign('id_kodeMatkul')->references('id')->on('ref_damatkuls')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('ref_dosens')->onDelete('cascade');
            $table->foreign('id_smt_thn_akd')->references('id')->on('ref_smt_thn_akds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_p_s');
    }
};
