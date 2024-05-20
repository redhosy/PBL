<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_smt_thn_akds;

class DatabaseSeederTahunakademik extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ref_smt_thn_akds::create([
            'smt_thn_akd' => '2022/2023-Genap',
            'status' => '0'
        ]);

        ref_smt_thn_akds::create([
            'smt_thn_akd' => '2023/2024-Ganjil',
            'status' => '0'
        ]);

        ref_smt_thn_akds::create([
            'smt_thn_akd' => '2023/2024-Genap',
            'status' => '1'
        ]);
    }
}
