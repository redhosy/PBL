<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_damatkul;

class DatabaseSeederMatkul extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ref_damatkul::create([
            'kode_matakuliah' => 'RPL3205',
            'nama_matakuliah' => 'Pengantar Rekayasa Perangkat Lunak',
            'TP' => 'T',
            'sks' => 2,
            'jam' => 2,
            'sks_teori' => 2,
            'sks_praktek' => 0,
            'jam_teori' => 2,
            'jam_praktek' => 0,
            'semester' => 2,
            'id_kurikulum' => 5,
        ]);
    }
}
