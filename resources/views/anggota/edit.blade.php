@extends('layout.app')
@section('konten')
<div class="container-fluid">
   <form method="POST" action="{{ route('anggota.update', $data->id) }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row">

         <div class="col-md-6">
            <div class="form-group">
               <label>Nomor Anggota</label>
               <input type="text" name="id_anggota" class="form-control" value="
                  {{ old('id_anggota', $data->id_anggota) }}" readonly required>
               @error('id_anggota') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Nama Anggota</label>
               <input type="text" name="nama" class="form-control" value="{{ old('nama', $data->nama)}}">
               @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class=" form-group">
               <label>Pekerjaan</label>
               <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $data->pekerjaan)}}"
                  required>
               @error('pekerjaan') <small class=" text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" rows="3" name="alamat"
                  placeholder="Enter ...">{{ old('alamat', $data->alamat)}}</textarea>
            </div>

            <div class="form-group">
               <label>Jenis Kelamin</label>
               <select class="custom-select" name="jenis_kelamin" required>
                  <option value="">Pilih</option>
                  <option value="Laki-laki"
                     {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki

                  </option>
                  <option value="Perempuan"
                     {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan

                  </option>
               </select>
               @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Nomor Handphone</label>
               <input type="number" name="nomor_handphone" value="{{ old('nomor_handphone', $data->nomor_handphone)}}"
                  class="form-control" required>
               @error('nomor_handphone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Alamat Email</label>
               <input type="text" name="alamat_email" class="form-control"
                  value="{{ old('alamat_email', $data->alamat_email)}}" required>
               @error('alamat_email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
         </div>


         <div class="col-md-6">
            <div class="form-group">
               <label>Status</label>
               <select name="status" class="custom-select" required>
                  <option value="">Pilih</option>
                  <option value="Aktif" {{ old('status', $data->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                  <option value="Tidak Aktif" {{ old('status', $data->status) == 'Tidak Aktif' ? 'selected' : '' }}>
                     Tidak Aktif
                  </option>
               </select>
               @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Pendidikan Terakhir</label>
               <select name="pendidikan_terakhir" class="custom-select" required>
                  <option value="">Pilih</option>
                  <option value="S3"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'S3' ? 'selected' : '' }}>
                     S3
                  </option>
                  <option value="S2"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>
                     S2
                  </option>
                  <option value="S1"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'S1' ? 'selected' : '' }}>
                     S1
                  </option>
                  <option value="SMA"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA
                  </option>
                  <option value="SMK"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'SMK' ? 'selected' : '' }}>SMK
                  </option>
                  <option value="SMP"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'SMP' ? 'selected' : '' }}>SMP
                  </option>
                  <option value="SD"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'SD' ? 'selected' : '' }}>SD</option>
                  <option value="Lainnya"
                     {{ old('pendidikan_terakhir', $data->pendidikan_terakhir) == 'Lainnya' ? 'selected' : '' }}>
                     Lainnya
                  </option>
               </select>
               @error('pendidikan_terakhir') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Instansi</label>
               <input type="text" name="instansi" class="form-control" value="{{ old('instansi', $data->instansi)}}"
                  required>
               @error('instansi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Tanggal Daftar</label>
               <input type="date" class="form-control" value="{{ old('tanggal_daftar', $data->tanggal_daftar)}}"
                  name="tanggal_daftar">
            </div>

            <div class="form-group">
               <label>Berlaku Hingga</label>
               <input type="date" class="form-control" value="{{ old('berlaku_hingga', $data->berlaku_hingga)}}"
                  name="berlaku_hingga">
            </div>

            <div class="form-group">
               <label>Input Foto</label>
               <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" accept=".jpg,.jpeg,.png"
                     id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
               @if($data->foto)
               <small class="d-block mt-2">Foto lama:</small>
               <img src="{{ asset('storage/foto/'.$data->foto) }}" alt="Foto Anggota" width="100">
               @endif
            </div>

            <div class="form-group mt-3">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('anggota.index') }}" class="btn btn-danger">Kembali</a>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection