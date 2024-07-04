<?php

namespace Database\Seeders;

use App\Models\ref_datakbk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederDatakbk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ref_datakbk::insert([
            [
                'kodekbk' => 'CP',
                'nama' => 'Center of Programming',
                'deskripsi' => 'Berfokus pada pengembangan keterampilan pemrograman dan teknik perangkat lunak.'
            ],
            [
                'kodekbk' => 'SOFTAM',
                'nama' => 'Center of Software Technology and Management',
                'deskripsi' => 'Fokus pada pengembangan dan manajemen teknologi perangkat lunak.'
            ],
            [
                'kodekbk' => 'CNSI',
                'nama' => 'Center of Network, Security, and Infrastructure',
                'deskripsi' => 'Mengkhususkan diri pada jaringan, keamanan, dan infrastruktur IT.'
            ],
            [
                'kodekbk' => 'CAI',
                'nama' => 'Center of Artificial Intelligence',
                'deskripsi' => 'Berkonsentrasi pada penelitian dan pengembangan kecerdasan buatan.'
            ],
            [
                'kodekbk' => 'CDAM',
                'nama' => 'Center of Desain, Animation and Multimedia',
                'deskripsi' => 'Berfokus pada desain, animasi, dan multimedia kreatif.'
            ],
        ]);
    }
}
