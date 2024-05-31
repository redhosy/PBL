<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_damatkul extends Model
{
    use HasFactory;

    protected $table = 'ref_damatkuls';

    protected $guarded = ['id'];

    public function kurikulum()
    {
        return $this->belongsTo(ref_dakur::class, 'id_kurikulum');
    }
}
