<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_dosenkbk extends Model
{
    use HasFactory;

    protected $table = 'ref_dosenkbk';

    protected $guarded = ['id'];

    public function kbk()
    {
        return $this->belongsTo(ref_datakbk::class, 'id_datakbk');
    }
    public function dosen()
    {
        return $this->belongsTo(ref_dosen::class, 'id_dosen');
    }

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }

    public function jurusan()
    {
        return $this->belongsTo(ref_jurusans::class, 'id_jurusan');
    }

    public function jabatan()
    {
        return $this->belongsTo(jabpims::class, 'id_jabatan');
    }
}
