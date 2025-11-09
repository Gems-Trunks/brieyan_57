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
        "kategori", // foreign
        "kode_buku", // foreign
        "judul_buku",
        "pengarang",
        'penerbit',
        'tahun_terbit',
        'isbn',
        'kode_rak', // foreign
        'status',
    ];

    public function Rkategori()
    {
        return $this->belongsTo(Mkategori::class, 'kategori', 'id');
    }

    public function Rrak()
    {
        return $this->belongsTo(Mrak::class, 'kode_rak', 'id');
    }
}
