@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-body">
      <div>
         <a href="{{ route('buku.create')}}">
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
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $d )
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $d-> kode_buku}}</td>
                  <td>{{ $d-> judul_buku}}</td>
                  <td>{{ $d-> pengarang}}</td>
                  <td>{{ $d-> status}}</td>
                  <td>
                     <div class="dflex-1 gap-2" role="group">
                        <a href="{{ route('buku.edit', $d->id)}}" class="btn btn-success btn-sm p-1"><i
                              class="fa fa-edit"></i></a>
                        <form action="{{ route('buku.destroy', $d->id)}}" method="POST"
                           onsubmit="return confirm('Anda yakin menghapus data ini?');">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger btn-sm p-1"><i class="fa fa-trash"></i></button>
                        </form>
                        <a href="{{route('buku.show', $d->id)}}" class="btn btn-primary btn-sm p-1"><i
                              class="fa fa-eye"></i></a>
                     </div>
                  </td>
               </tr>
               @endforeach

            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection