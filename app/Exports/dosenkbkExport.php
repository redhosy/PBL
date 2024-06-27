<?php

namespace App\Exports;

use App\Models\ref_dosenkbk;
use Maatwebsite\Excel\Concerns\FromCollection;

class dosenkbkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ref_dosenkbk::all()->map(function($item){
            return [
                'ID' => $item->id,
                'Nama' => $item->nama,
                'Nip' => $item->nip,
                'Jurusan' => $item->jurusan->jurusan,
                'Prodi' => $item->prodi->prodi,
                'KBK' => $item->kbk->kodekbk,
                'Jabatan' => $item->jabatan->jabatan_pimpinan,
                'Email' => $item->email,
                'Status' => $item->status == 1 ? 'Aktif' : 'Non-Aktif',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'nama',
            'nip',
            'id_jurusan',
            'id_prodi',
            'id_datakbk',
            'id_jabatan',
            'email',
            'status',
            // Add other column headings as needed
        ];
    }
}
