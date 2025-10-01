<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manggota;

class Canggota extends Controller
{
    public function index()
    {
        $data = Manggota::all();
        return view('anggota.index', compact('data'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'id_anggota'    => 'unique:anggota,id_anggota',
        ]);

        $filename = null;
        $foto = $request->file('foto');
        if ($foto) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $foto->move(public_path('uploads/foto'), $filename);
        }

        Manggota::create([
            'foto'          => $filename,
            'id_anggota'    => $request->id_anggota,
            'nama'          => $request->nama,
            'pekerjaan'          => $request->pekerjaan,
            'alamat'          => $request->alamat,
            'jenis_kelamin'          => $request->jenis_kelamin,
            'nomor_handphone'          => $request->nomor_handphone,
            'alamat_email'          => $request->alamat_email,
            'status'          => $request->status,
            'pendidikan_terakhir'          => $request->pendidikan_terkakhir,
            'instansi'          => $request->instansi,
            'tanggal_daftar'          => $request->tanggal_daftar,
            'berlaku_hingga'          => $request->berlaku_hingga,
        ]);

        return redirect()->route('anggota.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    public function update(Request $request, $id)
    {
        $anggota = Manggota::findOrFail($id);
        $filename = $anggota->foto;
        $foto = $request->file('foto');
        if ($foto) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $foto->move(public_path('uploads/foto'), $filename);
        }

        $anggota->update([
            'foto'          => $filename,
            'id_anggota'    => $request->id_anggota,
            'nama'          => $request->nama,
            'pekerjaan'          => $request->pekerjaan,
            'alamat'          => $request->alamat,
            'jenis_kelamin'          => $request->jenis_kelamin,
            'nomor_handphone'          => $request->nomor_handphone,
            'alamat_email'          => $request->alamat_email,
            'status'          => $request->status,
            'pendidikan_terakhir'          => $request->pendidikan_terkakhir,
            'instansi'          => $request->instansi,
            'tanggal_daftar'          => $request->tanggal_daftar,
            'berlaku_hingga'          => $request->berlaku_hingga,
        ]);

        return redirect()->route('anggota.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    private function kode_anggota()
    {
        $nomor_terakhir = Manggota::orderBy('id_anggota', 'desc')->first();
        if (!$nomor_terakhir) {
            $kode_baru = 'A-0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_anggota, 2);
            $nomor_baru = $lastKode + 1;
            $kode_baru = 'A-' . str_pad($nomor_baru, 4, '0', STR_PAD_LEFT);
        }
        return $kode_baru;
    }
}
