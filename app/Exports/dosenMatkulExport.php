<?php

namespace App\Exports;

use App\Models\RefDosenMatkul;
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
        return RefDosenMatkul::with(['dosen', 'matakuliah','kelas','semester'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NamaDosen',
            'Matakuliah',
            'Kelas',
            'Semester',
            // Add other column headings as needed
        ];
    }

    public function map($refDosenMatkul): array
    {
        return [
            $refDosenMatkul->id,
            $refDosenMatkul->dosen->nama, // Asumsikan relasi dosen memiliki atribut nama
            $refDosenMatkul->matakuliah->nama, // Asumsikan relasi matakuliah memiliki atribut nama
            $refDosenMatkul->kelas,
            $refDosenMatkul->semester,
            // Tambahkan mapping kolom lainnya jika diperlukan
        ];
    }
}
