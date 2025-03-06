<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standar_peforma extends Model
{
    use HasFactory;

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
