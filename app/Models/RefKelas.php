<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKelas extends Model
{
    use HasFactory;

    protected $table = 'refkelas';

    protected $guarded = ['id'];

    public function prodi(){
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }

    public function semester(){
        return $this->belongsTo(ref_smt_thn_akds::class, 'id_smt_thn_akd');
    }
}
