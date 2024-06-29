<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefDosenMatkul extends Model
{
    use HasFactory;

    protected $table='refdosenmatkul';

    protected $guarded = ['id'];

    public function dosen(){
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }

    public function kelas(){
        return $this->belongsTo(RefKelas::class, 'id_kelas');
    }

    public function matakuliah(){
        return $this->belongsTo(ref_damatkul::class, 'id_matakuliah');
    }

    public function semester(){
        return $this->belongsTo(ref_smt_thn_akds::class, 'id_smt_thn_akd');
    }
}
