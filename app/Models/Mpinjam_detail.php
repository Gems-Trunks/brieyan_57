<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mpinjam_detail extends Model
{
    //
    use HasFactory;
    protected $table = 'pinjam_detail';
    protected $fillable = ['id_pinjam', 'id_buku', 'tanggal_kembali', 'status'];
}
