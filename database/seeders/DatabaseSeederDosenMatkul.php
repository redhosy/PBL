<?php

namespace Database\Seeders;

use App\Models\RefDosenMatkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederDosenMatkul extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Buat entri pertama
    RefDosenMatkul::create([
        'id_dosen' => 220,
        'id_matakuliah' => 1,
        'id_kelas' => 1,
        'id_smt_thn_akd' => 3,
    ]);

    // Buat entri kedua
    RefDosenMatkul::create([
        'id_dosen' => 66,
        'id_matakuliah' => 1,
        'id_kelas' => 2,
        'id_smt_thn_akd' => 3,
    ]);
}
}
