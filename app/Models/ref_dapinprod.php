<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_dapinprod extends Model
{
    use HasFactory;
    protected $table = 'ref_dapinprods';

    public function dosen()
    {
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }

    public function jabpim()
    {
        return $this->belongsTo(jabpims::class, 'id_jabatan_pimpinan');
    }

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }

}
