<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_prodis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $table = 'ref_prodis'; 
    public function jurusan()
    {
        return $this->belongsTo(ref_jurusans::class, 'id_jurusan');
    }
}
