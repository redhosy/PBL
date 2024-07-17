<?php

namespace App\Exports;

use App\Models\ref_matakuliahkbk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class matkulExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $prodiId;

    public function __construct($prodiId)
    {
        $this->prodiId = $prodiId;
    }

    public function collection()
    {
        $query = ref_matakuliahkbk::query();
// dd($this->prodiId);
        if ($this->prodiId) {
            $query->where('id_prodi', $this->prodiId);
        }

        return $query->get()->map(function($item){
            return [
                'ID' => $item->id,
                'KodeMatkul' => $item->matkul->kode_matakuliah,
                'NamaMatkul' => $item->matkul->nama_matakuliah,
                'Semester' => $item->matkul->semester,
                'Keterangan' => $item->ket == 1 ? 'T' : ($item->ket == 2 ? 'P'  : 'T/P'),
                'KodeKBK' => $item->kbk->kodekbk,
                'Prodi' => $item->prodi->prodi,
                'JumlahSKS' => $item->matkul->sks,
                'Pengampu' => $item->dosen->nama,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'KodeMatkul',
            'NamaMatkul',
            'Semester',
            'Keterangan',
            'KodeKBK',
            'Prodi',
            'JumlahSKS',
            'Pengampu',
        ];
    }
}
