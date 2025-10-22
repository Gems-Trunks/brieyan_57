<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mrak extends Model
{
    //
    use HasFactory;
    protected $table = 'rak';
    protected $fillable = [
        'kode_rak',
        'keterangan',
    ];
}
