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
        $data = Mbuku::all();
        $buku = DB::table('buku')
            ->leftJoin('kategori', 'buku.kategori', '=', 'kategori.kategori')
            ->select('buku.*', 'kategori.kategori', 'kategori.kode_buku',)
            ->get();

        return view('buku.index', compact('data', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tahun' => 'numeric'
        ]);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mbuku $mbuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mbuku $mbuku)
    {
        //
    }
}
