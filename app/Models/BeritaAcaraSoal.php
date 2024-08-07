<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraSoal extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_soal';

    protected $guarded = ['id'];

    public function semester(){
        return $this->belongsTo(ref_smt_thn_akds::class, 'id_semester');
    }

    public function matkul(){
        return $this->belongsTo(ref_damatkul::class, 'id_matakuliah');
    }
}
