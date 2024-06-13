<?php

namespace Database\Seeders;

use App\Models\jabpims;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederJabpim extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        jabpims::insert([
            [
                'id' => 1,
                'jabatan_pimpinan' => 'Ketua Jurusan',
                'kode_jabatan_pimpinan' => 'KAJUR',
                'status' => '1'
            ],
            [
                'id' => 2,
                'jabatan_pimpinan' => 'Sekretaris Jurusan',
                'kode_jabatan_pimpinan' => 'SEKJUR',
                'status' => '1'
            ],
            [
                'id' => 3,
                'jabatan_pimpinan' => 'Koordinator Program',
                'kode_jabatan_pimpinan' => 'KAPRODI',
                'status' => '1'
            ],
        ]);
    }
}
