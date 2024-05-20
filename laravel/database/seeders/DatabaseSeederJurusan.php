<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_jurusans;

class DatabaseSeederJurusan extends Seeder
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
    }
}
