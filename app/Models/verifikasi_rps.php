<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifikasi_rps extends Model
{
    protected $table = 'verifikasi_r_p_s';

    protected $guarded = ['id'];

    public function kode_matkul()
    {
        return $this->belongsTo(ref_damatkul::class, 'id_KodeMatkul');
    }

    public function thnakd()
    {
        return $this->belongsTo(ref_smt_thn_akds::class, 'id_smt_thn_akd');
    }

    public function dosen()
    {
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }
}