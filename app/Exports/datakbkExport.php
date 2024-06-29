<?php

namespace App\Exports;

use App\Models\ref_datakbk;
use Maatwebsite\Excel\Concerns\FromCollection;

class datakbkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ref_datakbk::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Kode KBK',
            'Deskripsi',
            // Add other column headings as needed
        ];
    }
}
