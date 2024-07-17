<?php

namespace App\Imports;

use App\Models\jabpims;
use App\Models\ref_datakbk;
use App\Models\ref_dosen;
use App\Models\ref_dosenkbk;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class dosenkbkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Validasi dan konversi data
        $dosen = ref_dosen::where('nama', $row[1])->first();
        $jurusan = ref_jurusans::where('jurusan', $row[3])->first();
        $prodi = ref_prodis::where('prodi', $row[4])->first();
        $id_datakbk = ref_datakbk::where('kodekbk', $row[5])->first();
        $jabatan = jabpims::where('jabatan_pimpinan', $row[6])->first();
        // dd($id_datakbk);

        return new ref_dosenkbk([
            'id_dosen'=>$dosen->id,
            'nama' => $row[1],
            'nip' => $row[2],
            'id_jurusan' => $jurusan->id,
            'id_prodi' => $prodi->id,
            'id_datakbk' => $id_datakbk->id,
            'id_jabatan' => $jabatan->id,
            'email' => $row[7],
            'status' => $row[8] == 'Aktif' ? 1 : 0,
        ]);
    }
}
