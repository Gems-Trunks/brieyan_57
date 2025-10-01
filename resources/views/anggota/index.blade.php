@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-body">
      <div>
         <a href="{{ route('anggota.create')}}">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target=""
               title="Tambah data anggota"><i class="fa fa-plus-square"></i>
               &nbsp;Tambah Data</button>
         </a>
      </div>
      <div class="table-responsive">
         <table class="table table-sm table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>No Anggota</th>
                  <th>Nama Lengkap</th>
                  <th>Pekerjaan/Instansi</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach($data as $d)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                     @if($d->foto)
                     <a href="{{ asset('uploads/foto_anggota/'.$d->foto) }}">
                        <img src="{{ asset('uploads/foto_anggota/'.$d->foto) }}" width="50px" height="50px">
                     </a>
                     @endif
                  </td>
                  <td>{{ $d->id_anggota }}</td>
                  <td>{{ $d->nama }}</td>
                  <td>{{ $d->pekerjaan }}/ {{ $d->instansi }}</td>
                  <td>{{ $d->alamat }}</td>
                  <td>
                     <button type="button" class="btn btn-success btn-sm" title="Edit data" data-toggle="modal"
                        data-target="#edit{{ $d->id }}"><i class="fa fa-edit"></i></button>
                  </td>
                  </td>
                  @endforeach
               </tr>
               </tr>

      </div>
   </div>
</div>
@endsection