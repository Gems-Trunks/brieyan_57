@extends('layout.app')
@section('konten')
<table class="table table-bordered">
   <tr>
      <th width="180">No Pinjam</th>
      <td>{{ $peminjaman->no_pinjam }}</td>
   </tr>
   <tr>
      <th>Nama Anggota</th>
      <td>{{ $peminjaman->nama_anggota }}</td>
   </tr>
   <tr>
      <th>Tanggal Pinjam</th>
      <td>{{ dateID($peminjaman->tanggal_pinjam) }}</td>
   </tr>
   <tr>
      <th>Status</th>
      <td>
         @if ($peminjaman->status == 'pinjam')
         <span class="badge bg-danger">Dipinjam</span>
         @elseif ($peminjaman->status == 'sebagian')
         <span class="badge bg-warning text-dark">Sebagian</span>
         @else
         <span class="badge bg-success">Selesai</span>
         @endif
      </td>
   </tr>
</table>

<h6 class="mt-4">Daftar Buku</h6>
<table class="table table-bordered table-striped table-sm">
   <thead class="table-dark">
      <tr>
         <th style="width:40px;">No</th>
         <th>Kode Buku</th>
         <th>Judul Buku</th>
         <th>Status</th>
         <th>Tanggal Kembali</th>
         <th style="width:100px;">Aksi</th>
      </tr>
   </thead>
   <tbody>
      @foreach($detail as $d)
      <tr>
         <td class="text-center">{{ $loop->iteration }}</td>
         <td>{{ $d->kode_buku }}</td>
         <td>{{ $d->judul_buku }}</td>
         <td class="text-center">
            @if($d->status == 'kembali')
            <span class="badge bg-success">Kembali</span>
            @else
            <span class="badge bg-danger">Dipinjam</span>
            @endif
         </td>
         <td class="text-center">
            {{ $d->tanggal_kembali ? dateID($d->tanggal_kembali) : '-' }}
         </td>
         <td class="text-center">
            @if($d->status != 'kembali')
            <a href="{{ route('pinjam.kembali', [$peminjaman->id, $d->id_buku]) }}"
               class="btn btn-success btn-sm tombol2" onclick="return confirm('Kembalikan buku ini?')">
               Kembalikan
            </a>
            @else
            <span class="text-muted">-</span>
            @endif
         </td>
      </tr>
      @endforeach
   </tbody>
</table>

<a href="{{ route('pinjam.index') }}" class="btn btn-secondary btn-sm mt-3">
   <i class="fa fa-arrow-left"></i> Kembali ke Daftar
</a>
@endsection