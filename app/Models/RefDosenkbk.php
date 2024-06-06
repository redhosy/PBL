<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefDosenkbk extends Model
{
    protected $table = 'dosenkbk';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(ref_jurusans::class, 'id_jurusan');
    }

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }
}
