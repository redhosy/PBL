<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPS extends Model
{
    protected $table = 'r_p_s';
    

    public static function validate(array $data)
    {
        return validator()->make($data, [
            'koderps' => 'required',
            'kode_matkul' => 'required',
            'versi' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'dosen' => 'required',
        ]);
    }

    public function kode_matkul()
    {
        return $this->belongsTo(ref_damatkuls  ::class, 'id_kode_matakuliah');
    }

    public function versi()
    {
        return $this->belongsTo(ref_smt_thn_akds  ::class, 'id_smt_thn_akd');
    }
}
    