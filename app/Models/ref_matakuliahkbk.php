<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_matakuliahkbk extends Model
{
    use HasFactory;

    protected $table = 'ref_matakuliahkbk';
    protected $guarded = ['id'];


    public function matkul()
    {
        return $this->belongsTo(ref_damatkul::class, 'id_matkul');
    }

    public function kbk()
    {
        return $this->belongsTo(ref_datakbk::class, 'id_datakbk');
    }

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }

    public function dosen()
    {
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }

}
