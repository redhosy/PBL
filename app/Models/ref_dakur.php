<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_dakur extends Model
{
    use HasFactory;

    protected $table = 'ref_dakurs';
    protected $guarded = ['id'];

    public function prodi()
    {
        return $this->belongsTo(ref_prodis::class, 'id_prodi');
    }
}
