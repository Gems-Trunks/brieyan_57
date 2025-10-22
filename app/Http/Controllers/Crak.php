<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mrak;

class Crak extends Controller
{
    //
    public function index()
    {
        $judul = "DATA RAK";
        $data = Mrak::all(); // semua rak
        return view('rak.index', compact('data', 'judul'));
    }

    /**
     * Simpan rak baru (dari modal tambah)
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_rak' => 'required|unique:rak,kode_rak|max:50',
            'keterangan'  => 'required|max:255',
        ]);

        Mrak::create([
            'kode_rak' => $request->kode_rak,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('rak.index')
            ->with('success', 'rak berhasil ditambahkan');
    }

    /**
     * Update rak (dari modal edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_rak' => 'required|unique:rak,kode_rak|max:50',
            'keterangan'  => 'required|max:255',
        ]);

        $rak = Mrak::findOrFail($id);

        $rak->update([
            'kode_rak' => $request->kode_rak,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('rak.index')
            ->with('success', 'rak berhasil diperbarui');
    }

    /**
     * Hapus rak
     */
    public function destroy($id)
    {
        $rak = Mrak::findOrFail($id);
        $rak->delete();

        return redirect()->route('rak.index')
            ->with('success', 'rak berhasil dihapus');
    }
}
