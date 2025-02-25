<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standar_peforma extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
