<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Perkembangan extends Model
{
    Use HasFactory;

    protected $fillable = [
        'populasi_id',
        'umur',
        'kematian_atas',
        'kematian_bawah',
        'id_tipe_pakan_atas',
        'pakan_atas',
        'id_tipe_pakan_bawah',
        'pakan_bawah',
        'abw_betina-atas',
        'abw_betina-bawah',
        'abw_normal_atas',
        'abw_normal_bawah',
    ];

    public function getHashidAttribute() {
        return Hashids::encode($this->id);
    }

    public function populasi(){
        return $this->belongsTo(Populasi::class);
    }

    public function pakanAtas(){
        return $this->belongsTo(Pakan::class, 'id_tipe_pakan_atas');
    }

    public function pakanBawah(){
        return $this->belongsTo(Pakan::class, 'id_tipe_pakan_bawah');
    }
}
