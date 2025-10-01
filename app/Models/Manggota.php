<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'foto',
        'id_anggota',
        'nama',
        'pekerjaan',
        'alamat',
        'jenis_kelamin',
        'nomor_handphone',
        'alamat_email',
        'status',
        'pendidikan_terakhir',
        'instansi',
        'tanggal_daftar',
        'berlaku_hingga',
    ];
}