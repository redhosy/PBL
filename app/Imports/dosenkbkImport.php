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

class dosenkbkImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Validasi dan konversi data
        $dosen = ref_dosen::where('nama', $row['nama'])->first();
        $jurusan = ref_jurusans::where('jurusan', $row['jurusan'])->first();
        $prodi = ref_prodis::where('prodi', $row['prodi'])->first();
        $jabatan = jabpims::where('jabatan_pimpinan', $row['jabatan'])->first();
        $id_datakbk = ref_datakbk::where('kodekbk', $row['kbk'])->first();
        // dd($id_datakbk);

        return new ref_dosenkbk([
            'id_dosen'=>$dosen->id,
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'id_jurusan' => $jurusan->id,
            'id_prodi' => $prodi->id,
            'id_datakbk' => $id_datakbk->id,
            'id_jabatan' => $jabatan->id,
            'email' => $row['email'],
            'status' => $row['status'] == 'Aktif' ? 1 : 0,
        ]);
    }
}
