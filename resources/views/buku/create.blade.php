@extends('layout.app')
@section('konten')
<div class="card">
   <div class="card-body">
      <form action="{{ route('buku.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-6">
               <div class="form-group d-flex align-items-end gap-2">
                  {{-- Dropdown kategori --}}
                  <div style="flex: 1;">
                     <label for="kategori">Kategori</label>
                     <select name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" data-kode="{{ $k->kode_buku }}">
                           {{ $k->kategori }}
                        </option>
                        @endforeach
                     </select>
                  </div>

                  {{-- Kode kategori otomatis --}}
                  <div style="flex: 1;">
                     <label>Kode dari Kategori</label>
                     <input type="text" id="kode_kategori" class="form-control" readonly>
                  </div>

                  {{-- Kode tambahan manual --}}
                  <div style="flex: 1;">
                     <label>Kode Tambahan</label>
                     <input type="text" name="kode_buku" id="kode_buku" class="form-control"
                        placeholder="Masukkan kode tambahan" required>
                  </div>
               </div>
               <div class="form-group">
                  <label>Judul Buku</label>
                  <input type="text" name="judul_buku" class="form-control" value="" required placeholder="Judul Buku">
                  @error ('judul_buku') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
               <div class="form-group">
                  <label>Pengarang</label>
                  <input type="text" name="pengarang" class="form-control" value="" required
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
               <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                     <option value="Ada">Ada</option>
                     <option value="Tidak">Tidak</option>
                  </select>
                  @error ('posisi_buku') <small class="text-danger">{{ $message}}</small>@enderror
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-primary btn-sm p-1">
            Simpan
         </button>
         <a href="{{route('buku.index')}}" class="btn btn-secondary btn-sm p-1">Kembali</a>
      </form>
   </div>
</div>
<script>
   document.getElementById('kategori').addEventListener('change', function() {
      // ambil option yang dipilih
      const selected = this.options[this.selectedIndex];
      // ambil data-kode dari option itu
      const kode = selected.getAttribute('data-kode') || '';
      // masukkan ke input
      document.getElementById('kode_kategori').value = kode;
   });
</script>
@endsection