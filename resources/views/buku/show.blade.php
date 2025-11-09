@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-header">
      Detail Buku
   </div>
   <div class="card-body">
      <p><strong>kategori:</strong> {{ $buku->Rkategori->kategori ?? '-' }}</p>
      <p><strong>kodebuku:</strong> {{ $buku->kode_buku }}</p>
      <p><strong>tahun terbit</strong> {{ $buku->tahun_terbit }}</p>
      <p><strong>judul buku:</strong> {{ $buku->judul_buku }}</p>
      <p><strong>pengarang:</strong> {{ $buku->pengarang }}</p>
      <p><strong>penerbit:</strong> {{ $buku->penerbit }}</p>
      <p><strong>kode_rak:</strong> {{ $buku->Rrak->kode_rak ?? '-' }}</p>


   </div>
   <div class="card-footer">
      <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-success">Edit</a>
   </div>
</div>
@endsection