<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_jurusans extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $table = 'ref_jurusans';
    // public function prodis()
    // {
    //     return $this->hasMany(ref_prodis::class, 'id_jurusan', 'id');
    // }
}
