<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manggota;

class Canggota extends Controller
{
    // index
    public function index()
    {
        $data = Manggota::all();
        return view('anggota.index', compact('data'));
    }


    // create
    public function create()
    {
        $kode_anggota = $this->kode_anggota();
        return view('anggota.create', compact('kode_anggota'));
    }

    // save
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
            $foto->move(public_path('uploads/foto_anggota'), $filename);
        }

        Manggota::create([
            'foto'                  => $filename,
            'id_anggota'            => $request->id_anggota,
            'nama'                  => $request->nama,
            'pekerjaan'             => $request->pekerjaan,
            'alamat'                => $request->alamat,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'nomor_handphone'       => $request->nomor_handphone,
            'alamat_email'          => $request->alamat_email,
            'status'                => $request->status,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'instansi'              => $request->instansi,
            'tanggal_daftar'        => $request->tanggal_daftar,
            'berlaku_hingga'        => $request->berlaku_hingga,
        ]);

        return redirect()->route('anggota.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    // edit
    public function edit($id)
    {
        $data = Manggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
    }

    // update
    public function update(Request $request, $id)
    {
        $anggota = Manggota::findOrFail($id);
        $filename = $anggota->foto;
        $foto = $request->file('foto');
        if ($foto) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $foto->move(public_path('uploads/foto_anggota'), $filename);
        }

        $anggota->update([
            'foto'                  => $filename,
            'id_anggota'            => $request->id_anggota,
            'nama'                  => $request->nama,
            'pekerjaan'             => $request->pekerjaan,
            'alamat'                => $request->alamat,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'nomor_handphone'       => $request->nomor_handphone,
            'alamat_email'          => $request->alamat_email,
            'status'                => $request->status,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'instansi'              => $request->instansi,
            'tanggal_daftar'        => $request->tanggal_daftar,
            'berlaku_hingga'        => $request->berlaku_hingga,
        ]);

        return redirect()->route('anggota.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    // show
    public function show($id)
    {
        $anggota = Manggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }
    // delete
    public function delete($id)
    {
        $anggota = Manggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('sukses', 'berhasil di hapus');
    }


    private function kode_anggota()
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Manggota::where('id_anggota', 'like', 'A - ' . $tahun_bulan . '%')
            ->orderBy('id_anggota', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'A-' . $tahun_bulan . '01';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_anggota, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'A-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }
}
