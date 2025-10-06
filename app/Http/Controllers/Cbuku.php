<?php

namespace App\Http\Controllers;

use App\Models\Mbuku;
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
        $data = DB::table('buku')
            ->leftJoin('kategori', 'buku.kategori', '=', 'kategori.kategori')
            ->select('buku.*', 'kategori.kategori', 'kategori.kode_buku',)
            ->get();

        return view('buku.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = DB::table('kategori')->get();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $kategori = DB::table('kategori')->where('id', $request->kategori)->first();
        $gabunganKode = $kategori->kode_buku . $request->kode_buku;
        $request->validate([
            'kategori' => 'required',
            'kode_buku' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'judul_buku' => 'string|required|max:255',
            'pengarang' => 'string|required|max:255',
            'penerbit' => 'string|required|max:255',
            'posisi_buku' => 'string|required|max:255',
        ]);
        Mbuku::create([
            'kategori' => $request->kategori,
            'kode_buku' => $gabunganKode,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'posisi_buku' => $request->posisi_buku,
            'status' => $request->status,
        ]);

        return redirect()->route('buku.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Mbuku $mbuku)
    {
        //  
        return view('buku.show', compact('mbuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mbuku $mbuku)
    {
        //
        $kategori = DB::table('kategori')->get();
        return view('buku.edit', compact('mbuku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mbuku $mbuku)
    {
        //

        $request->validate([
            'kategori' => 'required',
            'kode_buku' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'judul_buku' => 'string|required|max:255',
            'pengarang' => 'string|required|max:255',
            'penerbit' => 'string|required|max:255',
            'posisi_buku' => 'string|required|max:255',
        ]);
        $mbuku->update([
            'kategori' => $request->kategori,
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'posisi_buku' => $request->posisi_buku,
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
