<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ref_dosen;

class DatabaseSeederDosen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ref_dosen::create([
            'id' => 13,
            'nama' => 'ALDE ALANDA, S.Kom, M.T',
            'nidn' => '0025088802',
            'nip' => '198808252015041002',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'alde@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 14,
            'nama' => 'ALDO ERIANDA, M.T, S.ST',
            'nidn' => '003078904',
            'nip' => '198907032019031015',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'aldo@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 40,
            'nama' => 'CIPTO PRABOWO, S.T, M.T',
            'nidn' => '0002037410',
            'nip' => '197403022008121001',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'cipto@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 46,
            'nama' => 'DEDDY PRAYAMA, S.Kom, M.ISD',
            'nidn' => '0015048105',
            'nip' => '198104152006041002',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'deddy@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 50,
            'nama' => 'DEFNI, S.Si, M.Kom',
            'nidn' => '0007128104',
            'nip' => '198112072008122001',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'defni@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 52,
            'nama' => 'DENI SATRIA, S.Kom, M.Kom',
            'nidn' => '0028097803',
            'nip' => '197809282008121002',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'dns1st@gmail.com',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 66,
            'nama' => 'DWINY MEIDELFI, S.Kom, M.Cs',
            'nidn' => '0009058601',
            'nip' => '198605092014042001',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'dwinymeidelfi@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 85,
            'nama' => 'ERVAN ASRI, S.Kom, M.Kom',
            'nidn' => '0001097802',
            'nip' => '197809012008121001',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'ervan@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 91,
            'nama' => 'FAZROL ROZI, M.Sc.',
            'nidn' => '0021078601',
            'nip' => '19860721201012006',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'fazrol@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 103,
            'nama' => 'FITRI NOVA, M.T, S.ST',
            'nidn' => '1029058502',
            'nip' => '198505292014042001',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'fitrinova85@gmail.com',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 109,
            'nama' => 'Ir. HANRIYAWAN ADNAN MOODUTO, M.Kom.',
            'nidn' => '0010056606',
            'nip' => '196605101994031003',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'mooduto@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 116,
            'nama' => 'HENDRICK, S.T, M.T.,Ph.D',
            'nidn' => '0002127705',
            'nip' => '197712022006041000',
            'gender' => 1,
            'id_jurusan' => 4,
            'id_prodi' => 7,
            'email' => 'hendrickpnp77@gmail.com',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 121,
            'nama' => 'HIDRA AMNUR, S.E., S.Kom, M.Kom',
            'nidn' => '0015048209',
            'nip' => '198204152012121002',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'hidra@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 122,
            'nama' => 'HUMAIRA, S.T, M.T',
            'nidn' => '0019038103',
            'nip' => '198103192006042002',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'humaira@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 127,
            'nama' => 'IKHSAN YUSDA PRIMA PUTRA, S.H., LL.M',
            'nidn' => '0001107505',
            'nip' => '197510012006041002',
            'gender' => 1,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => '',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 132,
            'nama' => 'INDRI RAHMAYUNI, S.T, M.T',
            'nidn' => '0025068301',
            'nip' => '198306252008012004',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'indri@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 160,
            'nama' => 'MERI AZMI, S.T, M.Cs',
            'nidn' => '0029068102',
            'nip' => '198106292006042001',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'meri@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);

        ref_dosen::create([
            'id' => 178,
            'nama' => 'NINIK SULISTIANI, S.T, M.T',
            'nidn' => '0029068001',
            'nip' => '198006292008042002',
            'gender' => 0,
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'niniksulistiani@pnp.ac.id',
            'image' => '',
            'status' => 1,
        ]);
    }
}
