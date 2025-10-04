@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-body">
      <form action="{{ route('buku.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="katogori">
                     <option value="">Pilih</option>
                     <option value="">Pilih</option> <!-- isi ini -->
                  </select>
                  @error ('kategori') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Kode Buku</label>
                  <input type="number" name="kode_buku" class="form-control" value="" required>
                  @error ('kode_buku') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Judul Buku</label>
                  <input type="text" name="judul_buku" class="form-control" value="" required placeholder="Judul Buku">
                  @error ('judul_buku') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Pengarang</label>
                  <input type="text" name="Pengarang" class="form-control" value="" required
                     placeholder="Nama Pengarang">
                  @error ('pengarang') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" value="" required placeholder="Nama Penerbit">
                  @error ('penerbit') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Tahun Terbit</label>
                  <input type="number" name="tahun_terbit" class="form-control" value="" required placeholder="Tahun">
                  @error ('tahun_terbit') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>ISBN</label>
                  <input type="text" name="isbn" class="form-control" value="" required placeholder="Nomor ISBN">
                  @error ('isbn') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Posisi Buku / Rak</label>
                  <input type="text" name="posisi_buku" class="form-control" value="" required
                     placeholder="Posisi Buku">
                  @error ('posisi_buku') <small class="text-danger">{{ $message}}</small>@enderror
               </div>

            </div>
         </div>
      </form>
   </div>
</div>
@endsection