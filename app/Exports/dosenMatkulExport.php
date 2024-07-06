<?php

namespace App\Exports;

use App\Models\RefDosenMatkul;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithMapping;

class dosenMatkulExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RefDosenMatkul::with(['dosen', 'matakuliah', 'kelas', 'semester'])->first();
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

    public function map($refDosenMatkul): array
    {
        return [
            $refDosenMatkul->id,
            $refDosenMatkul->matakuliah ? $refDosenMatkul->matakuliah->nama_matakuliah : '',
            $refDosenMatkul->dosen ? $refDosenMatkul->dosen->nama : '',
            $refDosenMatkul->kelas ? $refDosenMatkul->kelas->nama_kelas : '',
            $refDosenMatkul->semester ? $refDosenMatkul->semester->smt_thn_akd : '',
        ];
    }
}
