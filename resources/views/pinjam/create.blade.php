@extends('layout.app')
@section('konten')
<form action="{{ route('pinjam.store') }}" method="POST">
   @csrf
   <div class="mb-3">
      <label>No Pinjam</label>
      <input type="text" name="no_pinjam" class="form-control" required>
   </div>
   <div class="mb-3">
      <label>Anggota</label>
      <select name="id_anggota" class="form-control select2" required>
         <option value="">-- Pilih Anggota --</option>
         @foreach ($anggota as $a)
         <option value="{{ $a->id }}">{{ $a->id_anggota }} | {{ $a->nama }}</option>
         @endforeach
      </select>
   </div>
   <div class="mb-2 mt-2">
      <label>Buku yang Dipinjam (maks. 5)</label>
      <small class="text-muted"> <i>*Minimal pilih 1 buku.</i></small>
      <table class="table table-bordered table-sm">
         <thead class="table-dark">
            <tr>
               <th class="text-center" style="width:55px">No</th>
               <th>Judul Buku</th>
            </tr>
         </thead>
         <tbody>
            @for ($i = 1; $i <= 5; $i++) <tr>
               <td class="text-center">{{ $i }}</td>
               <td>
                  <select name="id_buku[]" class="form-control select2">
                     <option value="">-- Pilih Buku --</option>
                     @foreach ($buku as $b)
                     <option value="{{ $b->id }}">{{ $b->kode_buku }} | {{ $b->judul_buku }}</option>
                     @endforeach
                  </select>
               </td>
               </tr>
               @endfor
         </tbody>
      </table>
   </div>
   <div>
      <button type="submit" class="btn btn-primary btn-sm mt-2" title="Simpan Data Peminjaman"><i
            class="fa fa-save"></i> &nbsp;Simpan Data</button>
   </div>
</form>
@endsection