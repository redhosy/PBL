<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_dapinprod;

class DatabaseSeederPimprod extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        ref_dapinprod::create([
            'id_jabatan_pimpinan' => 3,
            'id_prodi' => 20,
            'id_dosen' => 160,
            'periode' => '2022-2026',
            'status' => '1',
        ]);
    }
}
