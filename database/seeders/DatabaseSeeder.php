<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        ref_jurusans::create([
            'kode_jurusan' => 'AN',
            'jurusan' => 'Administrasi Niaga',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'AK',
            'jurusan' => 'Akuntansi',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'BI',
            'jurusan' => 'Bahasa Inggris',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'EE',
            'jurusan' => 'Teknik Eletro',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'ME',
            'jurusan' => 'Teknik Mesin',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'SP',
            'jurusan' => 'Teknik Sipil',
        ]);

        ref_jurusans::create([
            'kode_jurusan' => 'TI',
            'jurusan' => 'Teknologi Informasi',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3MI',
            'prodi' => 'Manajemen Informatika D-3',
            'id_jurusan' => '7',
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3TK',
            'prodi' => 'Teknik Komputer D-3',
            'id_jurusan' => '7',
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => 'D4TRPL',
            'prodi' => 'Teknologi Rekayasa Perangkat Lunak D-4',
            'id_jurusan' => '7',
            'id_jenjang' => 'D4',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3SI-TD',
            'prodi' => 'D-3 Sistem Informasi (Tanah Datar)',
            'id_jurusan' => '7',
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3TK-SS',
            'prodi' => 'D-3 Teknik Komputer(Solok Selatan)',
            'id_jurusan' => '7',
            'id_jenjang' => 'D3',
        ]);

        ref_prodis::create([
            'kode_prodi' => '3MI-P',
            'prodi' => 'Manajemen Informatika (Pelalawan)',
            'id_jurusan' => '7',
            'id_jenjang' => 'D3',
        ]);
    }
}
