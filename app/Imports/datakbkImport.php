<?php

namespace App\Imports;

use App\Models\ref_datakbk;
use Illuminate\Support\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class datakbkImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ref_datakbk([
            'kodekbk' => $row[1],
            'nama' => $row[2],
            'deskripsi' => $row[3],
        ]);
    }
}