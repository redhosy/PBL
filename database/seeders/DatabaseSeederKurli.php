<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_dakur;

class DatabaseSeederKurli extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        ref_dakur::create([
            'kode_kurikulum' => 'KUR TRPL 2017',
            'nama_kurikulum' => 'Kurikulum TRPL 2017',
            'tahun' => 2017,
            'id_prodi' => 20,
            'status' => '0',
        ]);

        ref_dakur::create([
            'kode_kurikulum' => 'KUR TRPL 2017 REV',
            'nama_kurikulum' => 'Kurikulum TRPL 2017 Revisi',
            'tahun' => 2020,
            'id_prodi' => 20,
            'status' => '0',
        ]);

        ref_dakur::create([
            'kode_kurikulum' => 'KUR TRPL 2022',
            'nama_kurikulum' => 'Kurikulum TRPL 2022',
            'tahun' => 2022,
            'id_prodi' => 20,
            'status' => '1',
        ]);

        ref_dakur::create([
            'kode_kurikulum' => 'KUR TRPL 2022 V.1',
            'nama_kurikulum' => 'Kurikulum TRPL 2022 Versi 1',
            'tahun' => 2023,
            'id_prodi' => 20,
            'status' => '1',
        ]);

        ref_dakur::create([
            'kode_kurikulum' => 'KUR TRPL 2022 V.2',
            'nama_kurikulum' => 'Kurikulum TRPL 2022 Versi 2',
            'tahun' => 2024,
            'id_prodi' => 20,
            'status' => '1',
        ]);
    }
}
