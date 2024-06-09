<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_prodis;

class DatabaseSeederProdi extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        ref_prodis::create([
            'kode_prodi' => '4EC',
            'prodi' => 'D4 - Teknik Elektronika',
            'id_jurusan' => 4,
            'id_jenjang' => 'D4',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3MI',
            'prodi' => 'Manajemen Informatika D-3',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3TK',
            'prodi' => 'Teknik Komputer D-3',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '4TRPL',
            'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'id_jurusan' => 7,
            'id_jenjang' => 'D4',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3SI-TD',
            'prodi' => 'D-3 SISTEM INFORMASI (TANAH DATAR)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3TK-SS',
            'prodi' => 'D-3 Teknik Komputer (Solok Selatan)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3MI-P',
            'prodi' => 'Manajemen Informatika (Pelalawan)',
            'id_jurusan' => 7,
            'id_jenjang' => 'D3',
        ]);
    }
}
