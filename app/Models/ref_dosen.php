<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_dosen extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected  $table = 'ref_dosens';

    public function jurusan()
    {
        return $this->belongsTo(ref_jurusans::class, 'id_jurusan');
    }

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }

    public function matkulkbk(){
        return $this->hasMany(ref_matakuliahkbk::class, 'id_dosen');
    }
}
