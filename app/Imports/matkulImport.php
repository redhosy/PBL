<?php

namespace App\Imports;

use App\Models\ref_damatkul;
use App\Models\ref_datakbk;
use App\Models\ref_dosen;
use App\Models\ref_matakuliahkbk;
use App\Models\ref_prodis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class matkulImport implements ToModel,  WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $id_kbk = ref_datakbk::where('kodekbk', $row['kbk'])->first();
        $prodi = ref_prodis::where('prodi', $row['prodi'])->first();
        $dosen = ref_dosen::where('nama', $row['nama'])->first();
        $matkul = ref_damatkul::where('nama_matakuliah', $row['nama_matakuliah'])
            ->where('kode_matakuliah', $row['kode_matakuliah'])
            ->where('semester', $row['semester'])
            ->where('TP', $row['TP'])
            ->where('sks', $row['sks'])
            ->first();


        return new ref_matakuliahkbk([
            'id_matkul' => $matkul->id,
            'id_datakbk' => $id_kbk->id,
            'id_prodi' => $prodi->id,
            'id_dosen' => $dosen->id,
        ]);
    }
}
