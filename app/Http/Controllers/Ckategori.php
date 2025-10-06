<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mkategori;

class Ckategori extends Controller
{
    //
    public function index()
    {
        $judul = "DATA KATEGORI";
        $data = Mkategori::all(); // semua kategori
        return view('kategori.index', compact('data', 'judul'));
    }

    /**
     * Simpan kategori baru (dari modal tambah)
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:kategori,kode_buku|max:50',
            'kategori'  => 'required|max:255',
            'deskripsi' => 'nullable|',
        ]);

        Mkategori::create([
            'kode_buku' => $request->kode_buku,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Update kategori (dari modal edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku' => 'required|unique:kategori,kode_buku|max:50',
            'kategori'  => 'required|max:255',
            'deskripsi' => 'nullable|',
        ]);

        $kategori = Mkategori::findOrFail($id);

        $kategori->update([
            'kode_buku' => $request->kode_buku,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Hapus kategori
     */
    public function destroy($id)
    {
        $kategori = Mkategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
