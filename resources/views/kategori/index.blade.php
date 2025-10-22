@extends('layout.app')

@section('konten')
<div class="card">
   <div class="card-body">
      <button type="button" class="btn btn-primary btn-sm ms-2" data-toggle="modal" data-target="#tambahModal">
         <i class="fa fa-plus"></i>
         Tambah Data
      </button>
      <div class="table-responsive">
         <table class="table table-sm table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Kategori</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $d)
               <tr>
                  <td>{{ $loop->iteration }}</td>

                  <td>{{ $d->kode_buku }}</td>
                  <td>{{ $d->kategori }}</td>
                  <td>{{ $d->deskripsi }}</td> <!-- typo "deksripsi" aku ganti jadi "deskripsi" -->

                  <td>
                     <form action="{{ route('kategori.destroy', $d->id) }}" method="POST"
                        onsubmit="return confirm('Apakah anda yakin menghapus kategori ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                           <i class="fa fa-trash"></i>
                        </button>
                        <!-- modal edit -->
                        <button class="btn btn-success btn-sm" data-toggle="modal"
                           data-target="#modalEdit {{ $d->id }}">
                           <i class="fa fa-pen-square"></i>
                        </button>
                     </form>


                     <!-- Modal edit -->
                     <div class="modal fade" id="modalEdit {{ $d->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{route('kategori.update', $d->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                       <label for="kode">Kode Buku</label>
                                       <input name="kode_buku" class="form-control" type="text" required
                                          placeholder="Isi Kode Buku" value="{{ old('kode_buku', $d->kode_buku)}}">
                                       @error('kode_buku') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="ketegori">Kategori</label>
                                       <input name="kategroi" class="form-control" type="text" required
                                          placeholder="Nama Kategori" value="{{ old('kategori', $d->kategori)}}">
                                       @error('kategori') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="deskripsi">Deskripsi</label>
                                       <textarea name="deskripsi" id="deskripsi" class="form-control"
                                          placeholder="Isi deskripsi">{{ old('deskripsi', $d->dekripsi)}}</textarea>
                                       @error('deskripsi') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Tutup</button>
                                       <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-disk"></i>
                                          Simpan</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>


                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         <!-- Modal -->
         <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{route('kategori.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label for="kode">Kode Buku</label>
                           <input name="kode_buku" class="form-control" type="text" required
                              placeholder="Isi Kode Buku">
                           @error('kode_buku') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                           <label for="ketegori">Kategori</label>
                           <input name="kategori" class="form-control" type="text" required placeholder="Nama Kategori">
                           @error('kategori') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                           <label for="deskripsi">Deskripsi</label>
                           <textarea name="deskripsi" id="deskripsi" class="form-control"
                              placeholder="Isi deskripsi"></textarea>
                           @error('deskripsi') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                           <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-disk"></i>
                              Simpan</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- TUTUP MODAL -->
      </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('.btn-edit').click(function() {
      $('#edit_id').val($(this).data('id'));
      $('#edit_kode').val($(this).data('kode'));
      $('#edit_kategori').val($(this).data('kategori'));
      $('#edit_deskripsi').val($(this).data('deskripsi'));
      $('#formEditKategori').attr('action', '/buku/kategori/' + $(this).data('id'));
   });
});
</script>
@endsection