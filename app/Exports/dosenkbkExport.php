<?php

namespace App\Exports;

use App\Models\ref_dosenkbk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class dosenkbkExport implements FromCollection, WithHeadings
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
        $query = ref_dosenkbk::query();

        if ($this->prodiId) {
            $query->where('id_prodi', $this->prodiId);
        }

        return $query->get()->map(function ($item) {
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
            'Nama',
            'Nip',
            'Jurusan',
            'Prodi',
            'KBK',
            'Jabatan',
            'Email',
            'Status',
        ];
    }
}
