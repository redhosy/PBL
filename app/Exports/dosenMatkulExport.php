<?php

namespace App\Exports;

use App\Models\RefDosenMatkul;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithMapping;

class dosenMatkulExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
         return RefDosenMatkul::latest()->get()->map(function($data){
            return [
                'id'=>$data->id,
                'nama_dosen'=>$data->dosen->nama,
                'mata_kuliah'=>$data->matakuliah->nama_matakuliah,
                'kelas'=>$data->kelas->nama_kelas,
                'semester'=>$data->semester->smt_thn_akd
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'NamaDosen',
            'Matakuliah',
            'Kelas',
            'Semester',
        ];
    }
}
