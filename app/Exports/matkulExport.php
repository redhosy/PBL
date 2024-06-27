<?php

namespace App\Exports;

use App\Models\ref_matakuliahkbk;
use Maatwebsite\Excel\Concerns\FromCollection;

class matkulExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ref_matakuliahkbk::all()->map(function($item){
            return [
                'ID' => $item->id,
                'KodeMatkul' => $item->kode_matkul,
                'NamaMatkul' => $item->nama_matkul,
                'Semester' => $item->semester,
                'Keterangan' => $item->ket == 1 ? 'T' : ($item->ket == 2 ? 'P'  : 'T/P'),
                'KodeKBK' => $item->kbk->kodekbk,
                'Prodi' => $item->prodi->prodi,
                'JumlahSKS' => $item->Jumlah_SKS,
                'Pengampu' => $item->dosen->nama,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'kode_matkul',
            'nama_matkul',
            'semester',
            'ket',
            'id_datakbk',
            'id_prodi',
            'jumlah_SKS',
            'id_dosen',
            // Add other column headings as needed
        ];
    }

}
