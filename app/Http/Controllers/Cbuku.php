<?php

namespace App\Http\Controllers;

use App\Models\Mbuku;
use App\Models\Mkategori;
use App\Models\Mrak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cbuku extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $judul = "DATA BUKU";
        $data = Mbuku::with(["Rkategori", "Rrak"])->get();

        return view('buku.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Mkategori::get();
        $rak = Mrak::get();
        return view('buku.create', compact('kategori', 'rak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategori' => 'required',
            'kode_buku' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kode_rak' => 'required|string|max:255',
        ]);

        $kategori = Mkategori::find($request->kategori);
        $rak = Mrak::find($request->kode_rak);

        if (!$kategori && !$rak) {
            return back()->with('error', 'Kategori / rak tidak ditemukan.');
        }

        $gabunganKode = $kategori->kode_buku . '-' . $request->kode_buku;

        Mbuku::create([
            'kategori' => $kategori->id,
            'kode_buku' => $gabunganKode,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'kode_rak' => $rak->id,
            'status' => $request->status,
        ]);

        return redirect()->route('buku.index')->with('status', [
            'judul' => 'Berhasil',
            'pesan' => 'Data berhasil disimpan',
            'icon' => 'success'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Mbuku $buku)
    {
        //  
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mbuku $buku)
    {
        //
        $kategori = Mkategori::get();
        $rak = Mrak::get();
        return view('buku.edit', compact('buku', 'kategori', 'rak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mbuku $mbuku)
    {
        //

        $kategori = Mkategori::find($request->kategori);
        $rak = Mrak::find($request->kode_rak);

        if (!$kategori && !$rak) {
            return back()->with('error', 'Kategori / rak tidak ditemukan.');
        }

        $gabunganKode = $kategori->kode_buku . '-' . $request->kode_buku;

        $request->validate([
            'kategori' => 'required',
            'kode_buku' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'judul_buku' => 'string|required|max:255',
            'pengarang' => 'string|required|max:255',
            'penerbit' => 'string|required|max:255',
            'kode_rak' => 'string|required|max:255',
        ]);
        $mbuku->update([
            'kategori' => $kategori->id,
            'kode_buku' => $gabunganKode,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'kode_rak' => $rak->id,
            'status' => $request->status,
        ]);


        return redirect()->route('buku.index')->with('status', ['judul' => 'Berhasil', 'pesan' => "Data Berhasil di Simpan", 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mbuku $mbuku)
    {
        //
        $mbuku->delete();
        return redirect()->route('buku.index')->with('sukses', 'berhasil di hapus');
    }
}
