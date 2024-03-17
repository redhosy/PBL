<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\jurusan;
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
        jurusan::create([
            'kode_jurusan' => 'AN',
            'jurusan' => 'Administrasi Niaga',
        ]);

        jurusan::create([
            'kode_jurusan' => 'AK',
            'jurusan' => 'Akuntansi',
        ]);

        jurusan::create([
            'kode_jurusan' => 'BI',
            'jurusan' => 'Bahasa Inggris',
        ]);

        jurusan::create([
            'kode_jurusan' => 'EE',
            'jurusan' => 'Teknik Eletro',
        ]);

        jurusan::create([
            'kode_jurusan' => 'ME',
            'jurusan' => 'Teknik Mesin',
        ]);

        jurusan::create([
            'kode_jurusan' => 'SP',
            'jurusan' => 'Teknik Sipil',
        ]);

        jurusan::create([
            'kode_jurusan' => 'TI',
            'jurusan' => 'Teknologi Informasi',
        ]);
    }
}
