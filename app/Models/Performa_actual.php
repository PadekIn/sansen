<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Performa_actual extends Model
{
    Use HasFactory;

    protected $fillable = [
        'populasi_id',
        'fcr',
        'fi',
        'fe',
        'dep',
        'abw',
        'adg',
        'ip'
    ];

    public function getHashidAttribute() {
        return Hashids::encode($this->id);
    }

    public function populasi(){
        return $this->belongsTo(Populasi::class);
    }
}
