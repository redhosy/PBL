<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_prodis;

class DatabaseSeederProdi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ref_prodis::create([
            'id' => 7,
            'kode_prodi' => '3MI',
            'prodi' => 'Manajemen Informatika D-3',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'id' => 18,
            'kode_prodi' => '3TK',
            'prodi' => 'Teknik Komputer D-3',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'id' => 19,
            'kode_prodi' => 'D4TRPL',
            'prodi' => 'Teknologi Rekayasa Perangkat Lunak D-4',
            'id_jurusan' => 7,
            'id_jenjang' => 'D4',
        ]);

        ref_prodis::create([
            'id' => 21,
            'kode_prodi' => '3SI-TD',
            'prodi' => 'D-3 Sistem Informasi (Tanah Datar)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'id' => 22,
            'kode_prodi' => '3TK-SS',
            'prodi' => 'D-3 Teknik Komputer(Solok Selatan)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'id' => 23,
            'kode_prodi' => '3MI-P',
            'prodi' => 'Manajemen Informatika (Pelalawan)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);
    }
}
