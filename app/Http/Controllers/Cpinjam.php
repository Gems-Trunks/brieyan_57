<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpinjam;
use App\Models\Mpinjam_detail;
use App\Models\Manggota;
use App\Models\Mbuku;
use Illuminate\Support\Facades\DB;

class Cpinjam extends Controller
{
    //
    public function index()
    {
        $Judul = ' Data Pinjam';
        $peminjaman = DB::table('pinjam')
            ->join('anggota', 'pinjam.id_anggota', '=', 'anggota.id')
            ->select('pinjam.*', 'anggota.nama as nama_anggota')
            ->orderByDesc('pinjam.id')
            ->get();

        $detail = DB::table('pinjam_detail')
            ->join('buku', 'pinjam_detail.id_buku', '=', 'buku.id')
            ->select(
                'pinjam_detail.id_pinjam',
                'buku.judul_buku',
                'pinjam_detail.status',
                'pinjam_detail.tanggal_kembali'
            )
            ->get()
            ->groupBy('id_pinjam');

        return view('pinjam.index', compact('peminjaman', 'detail'));
    }

    public function create()
    {
        $anggota = Manggota::all();
        $buku = Mbuku::where('status', 'Ada')->get();

        return view('pinjam.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_buku'    => 'required|array|min:1|max:5',
            'id_buku.*'  => 'nullable|exists:buku,id',
        ]);

        $peminjaman = new Mpinjam();
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->no_pinjam = $request->no_pinjam;
        $peminjaman->tanggal_pinjam = now();
        $peminjaman->batas_pinjam = now()->addDays(7);
        $peminjaman->status = 'pinjam';
        $peminjaman->save();

        foreach ($request->id_buku as $id_buku) {
            if ($id_buku) {
                $detail = new Mpinjam_detail();
                $detail->id_pinjam = $peminjaman->id;
                $detail->id_buku = $id_buku;
                $detail->status = 'pinjam';
                $detail->save();

                $buku = Mbuku::find($id_buku);
                if ($buku) {
                    $buku->status = 'Dipinjam';
                    $buku->save();
                }
            }
        }
        return redirect()->route('pinjam.index')->with('status', [
            'judul' => 'Berhasil!',
            'pesan' => 'Data peminjaman berhasil disimpan.',
            'icon' => 'success',
        ]);
    }

    public function view($id)
    {
        $peminjaman = Mpinjam::join('anggota', 'pinjam.id_anggota', '=', 'anggota.id')
            ->select('pinjam.*', 'anggota.nama as nama_anggota')
            ->where('pinjam.id', $id)
            ->firstOrFail();

        $detail = Mpinjam_detail::join('buku', 'pinjam_detail.id_buku', '=', 'buku.id')
            ->select(
                'pinjam_detail.*',
                'buku.judul_buku',
                'buku.kode_buku'
            )
            ->where('pinjam_detail.id_pinjam', $id)
            ->get();

        return view('pinjam.view', compact('peminjaman', 'detail'));
    }

    public function kembali($id_pinjam, $id_buku)
    {
        $detail = Mpinjam_detail::where('id_pinjam', $id_pinjam)
            ->where('id_buku', $id_buku)
            ->where('status', '!=', 'kembali')
            ->first();

        if (!$detail) {
            return redirect()->back()->with('status', [
                'judul' => 'Info!',
                'pesan' => 'Buku ini sudah dikembalikan sebelumnya.',
                'icon' => 'info',
            ]);
        }

        // Update detail peminjaman
        $detail->status = 'kembali';
        $detail->tanggal_kembali = now();
        $detail->save();

        // Update status buku
        $buku = Mbuku::find($id_buku);
        if ($buku) {
            $buku->status = 'Ada';
            $buku->save();
        }

        // Update status peminjaman utama
        $total = Mpinjam_detail::where('id_pinjam', $id_pinjam)->count();
        $dikembalikan = Mpinjam_detail::where('id_pinjam', $id_pinjam)
            ->where('status', 'kembali')
            ->count();

        $peminjaman = Mpinjam::find($id_pinjam);
        if ($dikembalikan == $total) {
            $peminjaman->status = 'selesai';
        } elseif ($dikembalikan > 0 && $dikembalikan < $total) {
            $peminjaman->status = 'sebagian';
        } else {
            $peminjaman->status = 'pinjam';
        }
        $peminjaman->save();

        return redirect()->back()->with('status', [
            'judul' => 'Berhasil!',
            'pesan' => 'Buku berhasil dikembalikan.',
            'icon' => 'success',
        ]);
    }
}
