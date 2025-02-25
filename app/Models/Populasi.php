<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Vinkla\Hashids\Facades\Hashids;

class Populasi extends Model
{
    Use HasFactory;

    protected $fillable = [
        'jumlah',
        'berat',
        'umur_akhir',
        'grade_doc',
        'bw_doc',
        'asal_doc',
        'check_in',
        'check_out'
    ];

    public function getHashidAttribute() {
        return Hashids::encode($this->id);
    }

    public function peformaActual() : HasOne {
        return $this->hasOne(Performa_actual::class);
    }
}
