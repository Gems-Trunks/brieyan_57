@extends('layout.app')
@section('konten')
<div class="container-fluid">
   <form method="POST" action="{{ route('anggota.save') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">

         <div class="col-md-6">
            <div class="form-group">
               <label>Nomor Anggota</label>
               <input type="text" name="id_anggota" class="form-control" value="{{ $kode_anggota }}" required>
               @error('id_anggota') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Nama Anggota</label>
               <input type="text" name="nama" class="form-control" required>
               @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Pekerjaan</label>
               <input type="text" name="pekerjaan" class="form-control" required>
               @error('pekerjaan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" rows="3" name="alamat" placeholder="Enter ..."></textarea>
            </div>

            <div class="form-group">
               <label>Jenis Kelamin</label>
               <select class="custom-select" name="jenis_kelamin" required>
                  <option value="">Pilih</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
               </select>
               @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Nomor Handphone</label>
               <input type="number" name="nomor_handphone" class="form-control" required>
               @error('nomor_handphone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Alamat Email</label>
               <input type="text" name="alamat_email" class="form-control" required>
               @error('alamat_email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
         </div>


         <div class="col-md-6">
            <div class="form-group">
               <label>Status</label>
               <select name="status" class="custom-select" required>
                  <option value="">Pilih</option>
                  <option value="Aktif">Aktif</option>
                  <option value="tidak aktif">Tidak Aktif</option>
               </select>
               @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Pendidikan Terakhir</label>
               <select name="pendidikan_terakhir" class="custom-select" required>
                  <option value="">Pilih</option>
                  <option value="S3">S3</option>
                  <option value="S2">S2</option>
                  <option value="S1">S1</option>
                  <option value="SMA">SMA</option>
                  <option value="SMK">SMK</option>
                  <option value="SMP">SMP</option>
                  <option value="SD">SD</option>
                  <option value="Lainnya">Lainnya</option>
               </select>
               @error('pendidikan_terakhir') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Instansi</label>
               <input type="text" name="instansi" class="form-control" required>
               @error('instansi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
               <label>Tanggal Daftar</label>
               <input type="date" class="form-control" name="tanggal_daftar">
            </div>

            <div class="form-group">
               <label>Berlaku Hingga</label>
               <input type="date" class="form-control" name="berlaku_hingga">
            </div>

            <div class="form-group">
               <label>Input Foto</label>
               <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" accept=".jpg,.jpeg,.png"
                     id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
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