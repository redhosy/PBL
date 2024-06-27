<?php

namespace App\Imports;

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
        // dd($row);

        $prodi = ref_prodis::where('prodi', $row['prodi'])->first();
        $id_kbk = ref_datakbk::where('kodekbk', $row['kbk'])->first();
        $dosen = ref_dosen::where('nama', $row['nama'])->first();

        return new ref_matakuliahkbk([
            'kode_matkul' => $row['kode_matkul'],
            'nama_matkul' => $row['nama_matkul'],
            'semester' => $row['semester'],
            'ket' => $row['ket'],
            'id_datakbk' => $id_kbk->id,
            'id_prodi' => $prodi->id,
            'jumlah_sks' => $row['jumlah_sks'],
            'id_dosen' => $dosen->id,
        ]);
    }
}
