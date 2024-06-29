<?php

namespace Database\Seeders;

use App\Models\RefKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederKelas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RefKelas::create([
            'kode_kelas' => 'TRPL1A',
            'nama_kelas' => 'TRPL 1A',
            'id_prodi' => 20,
            'id_smt_thn_akd' => 1,
        ]);

        RefKelas::create([
            'kode_kelas' => 'TRPL1B',
            'nama_kelas' => 'TRPL 1B',
            'id_prodi' => 20,
            'id_smt_thn_akd' => 3,
        ]);
    }
}
