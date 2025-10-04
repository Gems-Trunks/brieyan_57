<?php

namespace App\Http\Controllers;

use App\Models\Mkategori;
use Illuminate\Http\Request;

class Ckategori extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "DATA KATEGORI";
        $data = Mkategori::all();
        return view('kategori.index', compact('data', 'judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'kategori' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:50',
        ]);
        Mkategori::create([
            'kategori' => $request->kategori,
            'kode_buku' => $request->kode_buku,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mkategori $mkategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mkategori $mkategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mkategori $mkategori)
    {
        //
        $request->validate([
            'kategori' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:255',
        ]);
        $mkategori->update(
            [
                'kode_buku' => $request->kode_buku,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,

            ]
        );
        return redirect()->route('kategori.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mkategori $mkategori)
    {

        $mkategori->DELETE();
        return redirect()->route('kategori.index')->with("success", "data berhasil di hapus");
    }
}
