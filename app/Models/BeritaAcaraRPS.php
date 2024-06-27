<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraRPS extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_rps';

    protected $guarded = ['id'];

    public function matakuliah(){
        return $this->belongsTo(ref_damatkul::class, 'id_matakuliah');
    }

}
