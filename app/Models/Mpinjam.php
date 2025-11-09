<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mpinjam extends Model
{
    //
    use HasFactory;
    protected $table = 'pinjam';
    protected $fillable = ['no_pinjam', 'id_anggota', 'tanggal_pinjam', 'batas_pinjam', 'status'];
}
