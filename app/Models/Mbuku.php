<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mbuku extends Model
{
    //
    use HasFactory; // ini buat apa si?
    protected $table = "buku";

    protected $fillable = [
        "kategori",
        "kode_buku",
        "judul_buku",
        "pengarang",
        'penerbit',
        'tahun_terbit',
        'isbn',
        'posisi_buku',
        'status',
    ];
}
