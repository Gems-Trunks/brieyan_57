@extends('layout.app')
@section('konten')

<div class="card">
   <div class="card-header">
      Detail Anggota
   </div>
   <div class="card-body">
      <p><strong>Nomor Anggota:</strong> {{ $anggota->id_anggota }}</p>
      <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
      <p><strong>Pekerjaan:</strong> {{ $anggota->pekerjaan }}</p>
      <p><strong>Alamat:</strong> {{ $anggota->alamat }}</p>
      <p><strong>Jenis Kelamin:</strong> {{ $anggota->jenis_kelamin }}</p>
      <p><strong>No HP:</strong> {{ $anggota->nomor_handphone }}</p>
      <p><strong>Email:</strong> {{ $anggota->alamat_email }}</p>
      <p><strong>Status:</strong> {{ $anggota->status }}</p>
      <p><strong>Pendidikan:</strong> {{ $anggota->pendidikan_terakhir }}</p>
      <p><strong>Instansi:</strong> {{ $anggota->instansi }}</p>
      <p><strong>Tanggal Daftar:</strong> {{ $anggota->tanggal_daftar }}</p>
      <p><strong>Berlaku Hingga:</strong> {{ $anggota->berlaku_hingga }}</p>

      @if($anggota->foto)
      <p><strong>Foto:</strong></p>
      <img src="{{ asset('uploads/foto_anggota' .$anggota->foto) }}" alt="Foto Anggota" width="150">
      @endif
   </div>
   <div class="card-footer">
      <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning">Edit</a>
   </div>
</div>

@endsection