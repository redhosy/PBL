<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_dapinjurs;

class DatabaseSeederPimjur extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        ref_dapinjurs::create([
            'id_jabatan_pimpinan' => 1,
            'id_jurusan' => 7,
            'id_dosen' => 223,
            'periode' => '2022-2026',
            'status' => '1',
        ]);

        ref_dapinjurs::create([
            'id_jabatan_pimpinan' => 2,
            'id_jurusan' => 7,
            'id_dosen' => 122,
            'periode' => '2022-2026',
            'status' => '1',
        ]);
    }
}
