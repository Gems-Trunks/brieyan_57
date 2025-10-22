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
                  <th>Kode Rak</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $d)
               <tr>
                  <td>{{ $loop->iteration }}</td>

                  <td>{{ $d->kode_rak }}</td>
                  <td>{{ $d->keterangan }}</td>
                  <td>
                     <form action="{{ route('rak.destroy', $d->id) }}" method="POST"
                        onsubmit="return confirm('Apakah anda yakin menghapus data rak ini?');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                           <i class="fa fa-trash"></i>
                        </button>
                        <!-- modal edit -->

                     </form>
                     <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit{{ $d->id }}">
                        <i class="fa fa-pen-square"></i>
                     </button>

                     <!-- Modal edit -->
                     <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Edit Rak</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{route('rak.update', $d->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                       <label for="kode">Kode Rak</label>
                                       <input name="kode_rak" class="form-control" type="text" required
                                          placeholder="Isi Kode Rak" value="{{ old('kode_rak', $d->kode_rak)}}"
                                          id="kode">
                                       @error('kode_rak') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="keterangan">Keterangan</label>
                                       <textarea name="keterangan" id="keterangan" class="form-control"
                                          placeholder="Isi keterangan">{{ old('keterangan', $d->keterangan)}}</textarea>
                                       @error('keterangan') <small class="text-danger">{{ $message }}</small>@enderror
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
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Rak</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{route('rak.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label for="kode">Kode rak</label>
                           <input name="kode_rak" class="form-control" type="text" required placeholder="Isi Kode Buku">
                           @error('kode_rak') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                           <label for="keterangan">Keterangan</label>
                           <textarea name="keterangan" id="keterangan" class="form-control"
                              placeholder="Isi keterangan"></textarea>
                           @error('keterangan') <small class="text-danger">{{ $message }}</small>@enderror
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

@endsection