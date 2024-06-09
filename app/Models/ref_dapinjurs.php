<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_dapinjurs extends Model
{
    use HasFactory;
    protected $table = 'ref_dapinjurs';

    public function jurusan()
    {
        return $this->belongsTo(ref_jurusans::class, 'id_jurusan');
    }
    public function jabpim()
    {
        return $this->belongsTo(jabpims::class, 'id_jabatan_pimpinan');
    }

    public function dosen()
    {
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }
}
