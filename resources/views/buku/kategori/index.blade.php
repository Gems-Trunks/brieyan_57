@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-sm table-bordered">
            <thead>
               <th>No</th>
               <th>Kode</th>
               <th>Nama Kategori</th>
               <th>Deskripsi</th>
               <th>Aksi</th>
            </thead>
            <tbody>
               @foreach ($data as $d )
               <tr>
                  <td>{{ $loop-> $iteration</td>   
                     <td>{{ $d-> kode_buku}}</td>
                  <td>{{ $d-> kategori}}</td>
                  <td>{{ $d-> deksripsi}}</td>
                  <td>
                     <a href="">
                        <form action="{{route('kategroi.destroy', $d->kode_buku" method="POST" onsubmit="return confirm('apakah anda yakin menghapus kategori ini?');">
                           @csrf
                           @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection