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
}
