<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Pakan extends Model
{
    Use HasFactory;

    protected $fillable = [
        'jenis',
        'jumlah',
        'tgl_beli',
        'keterangan'
    ];

    public function getHashidAttribute() {
        return Hashids::encode($this->id);
    }

    public function perkembanganAtas(){
        return $this->hasMany(Perkembangan::class, 'id_tipe_pakan_atas');
    }

    public function perkembanganBawah(){
        return $this->hasMany(Perkembangan::class, 'id_tipe_pakan_bawah');
    }
}
