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
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'alde@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 14,
            'nama' => 'ALDO ERIANDA, M.T, S.ST',
            'nidn' => '003078904',
            'nip' => '198907032019031015',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'aldo@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 40,
            'nama' => 'CIPTO PRABOWO, S.T, M.T',
            'nidn' => '0002037410',
            'nip' => '197403022008121001',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'cipto@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 46,
            'nama' => 'DEDDY PRAYAMA, S.Kom, M.ISD',
            'nidn' => '0015048105',
            'nip' => '198104152006041002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'deddy@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 50,
            'nama' => 'DEFNI, S.Si, M.Kom',
            'nidn' => '0007128104',
            'nip' => '198112072008122001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'defni@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 52,
            'nama' => 'DENI SATRIA, S.Kom, M.Kom',
            'nidn' => '0028097803',
            'nip' => '197809282008121002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'dns1st@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 66,
            'nama' => 'DWINY MEIDELFI, S.Kom, M.Cs',
            'nidn' => '0009058601',
            'nip' => '198605092014042001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'dwinymeidelfi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 85,
            'nama' => 'ERVAN ASRI, S.Kom, M.Kom',
            'nidn' => '0001097802',
            'nip' => '197809012008121001',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'ervan@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 91,
            'nama' => 'FAZROL ROZI, M.Sc.',
            'nidn' => '0021078601',
            'nip' => '19860721201012006',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'fazrol@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 103,
            'nama' => 'FITRI NOVA, M.T, S.ST',
            'nidn' => '1029058502',
            'nip' => '198505292014042001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'fitrinova85@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 109,
            'nama' => 'Ir. HANRIYAWAN ADNAN MOODUTO, M.Kom.',
            'nidn' => '0010056606',
            'nip' => '196605101994031003',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'mooduto@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 116,
            'nama' => 'HENDRICK, S.T, M.T.,Ph.D',
            'nidn' => '0002127705',
            'nip' => '197712022006041000',
            'gender' => '1',
            'id_jurusan' => 4,
            'id_prodi' => 7,
            'email' => 'hendrickpnp77@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 121,
            'nama' => 'HIDRA AMNUR, S.E., S.Kom, M.Kom',
            'nidn' => '0015048209',
            'nip' => '198204152012121002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'hidra@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 122,
            'nama' => 'HUMAIRA, S.T, M.T',
            'nidn' => '0019038103',
            'nip' => '198103192006042002',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'humaira@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 127,
            'nama' => 'IKHSAN YUSDA PRIMA PUTRA, S.H., LL.M',
            'nidn' => '0001107505',
            'nip' => '197510012006041002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => '',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 132,
            'nama' => 'INDRI RAHMAYUNI, S.T, M.T',
            'nidn' => '0025068301',
            'nip' => '198306252008012004',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'indri@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 160,
            'nama' => 'MERI AZMI, S.T, M.Cs',
            'nidn' => '0029068102',
            'nip' => '198106292006042001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'meriazmi@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 198,
            'nama' => 'Ir. Rahmat Hidayat, S.T, M.Sc.IT',
            'nidn' => '1015047801',
            'nip' => '197804152000121002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'rahmat@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 206,
            'nama' => 'RASYIDAH, S.Si, M.M.',
            'nidn' => '0001067407',
            'nip' => '197406012006042001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'rasyidah@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 212,
            'nama' => 'RIKA IDMAYANTI, S.T, M.Kom',
            'nidn' => '0022017806',
            'nip' => '197801222009122002',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'rikaidmayanti@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 220,
            'nama' => 'RITA AFYENNI, S.Kom, M.Kom',
            'nidn' => '0018077099',
            'nip' => '197007182008012010',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'ritaafyenni@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 223,
            'nama' => 'RONAL HADI, S.T, M.Kom',
            'nidn' => '0029017603',
            'nip' => '197601292002121001',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'ronalhadi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 258,
            'nama' => 'TAUFIK GUSMAN, S.S.T, M.Ds',
            'nidn' => '0010088805',
            'nip' => '19880810 201903 1 012',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'taufikgusman@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 277,
            'nama' => 'YANCE SONATHA, S.Kom, M.T',
            'nidn' => '0029128003',
            'nip' => '198012292006042001',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'sonatha.yance@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 289,
            'nama' => 'Dr. Ir. YUHEFIZAR, S.Kom., M.Kom',
            'nidn' => '0013017604',
            'nip' => '197601132006041002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'yuhefizar@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 292,
            'nama' => 'YULHERNIWATI, S.Kom, M.T',
            'nidn' => '0019077609',
            'nip' => '197607192008012017',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'yulherniwati@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 310,
            'nama' => 'TRI LESTARI, S.Pd.,M.Eng.',
            'nidn' => '0005039205',
            'nip' => '199203052019032025',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'trilestari0503@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 311,
            'nama' => 'Fanni Sukma, S.ST., M.T',
            'nidn' => '0006069009',
            'nip' => '199006062019032026',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'fannisukma@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 312,
            'nama' => 'Andre Febrian Kasmar, S.T., M.T.',
            'nidn' => '0020028804',
            'nip' => '198802202019031009',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'andrefebrian@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 351,
            'nama' => 'RONI PUTRA, S.Kom, M.T',
            'nidn' => '0022078607',
            'nip' => '198607222009121004',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'rn.putra@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 352,
            'nama' => 'Ardi Syawaldipa, S.Kom.,M.T.',
            'nidn' => '0029058909',
            'nip' => '19890529 202012 1 003',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'ardi.syawaldipa@gmail.com',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 353,
            'nama' => 'Harfebi Fryonanda, S.Kom., M.Kom',
            'nidn' => '0310119101',
            'nip' => '19911110 202203 1 008',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'harfebi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 354,
            'nama' => 'Ideva Gaputra, S.Kom., M.Kom',
            'nidn' => '0012098808',
            'nip' => '198809122022031006',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'idevagaputra@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 355,
            'nama' => 'Yulia Jihan Sy, S.Kom., M.Kom',
            'nidn' => '1017078904',
            'nip' => '19890717 202203 2 010',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'yulia@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 356,
            'nama' => 'Andrew Kurniawan Vadreas, S.Kom., M.T',
            'nidn' => '1021028702',
            'nip' => '19870221 202203 1 001',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'andrew@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 357,
            'nama' => 'YORI ADI ATMA, S.Pd., M.Kom',
            'nidn' => '2010059001',
            'nip' => '19900510 202203 1 002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 18,
            'email' => 'yori@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 358,
            'nama' => 'Dr. Ulya Ilhami Arsyah, S.Kom., M.Kom',
            'nidn' => '0130039101',
            'nip' => '19910330 202203 1 004',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'ulya@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 359,
            'nama' => 'Hendra Rotama, S.Pd., M.Sn',
            'nidn' => '0218068801',
            'nip' => '19880618 202203 1 003',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'hendrarotama@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 360,
            'nama' => 'Sumema, S.Ds., M.Ds',
            'nidn' => '0008069103',
            'nip' => '19910608 202203 2 006',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'sumema@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 361,
            'nama' => 'Raemon Syaljumairi, S.Kom., M.Kom',
            'nidn' => '0017078407',
            'nip' => '19840717 201012 1 002',
            'gender' => '1',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'raemon_syaljumairi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 362,
            'nama' => 'Mutia Rahmi Dewi, S.Kom., M.Kom',
            'nidn' => '0004099601',
            'nip' => '19960904 202203 2 018',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 20,
            'email' => 'mutiarahmi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 363,
            'nama' => 'Novi, S.Kom., M.T',
            'nidn' => '0001118611',
            'nip' => '19861101 202203 2 003',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'novi@pnp.ac.id',
            'status' => '1',
        ]);

        ref_dosen::create([
            'id' => 364,
            'nama' => 'Rahmi Putri Kurnia, S.Kom., M.Kom',
            'nidn' => '0027089303',
            'nip' => '19930827 202203 2 012',
            'gender' => '0',
            'id_jurusan' => 7,
            'id_prodi' => 19,
            'email' => 'rahmiputri@pnp.ac.id',
            'status' => '1 ',
        ]);
    }
}
