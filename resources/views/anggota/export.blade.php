<table class="table table-sm table-bordered">
   <thead>
      <tr>
         <th>No</th>
         <th>Foto</th>
         <th>No Anggota</th>
         <th>Nama Lengkap</th>
         <th>Pekerjaan/Instansi</th>
         <th>Alamat</th>
         <th>Tanggal Daftar</th>
      </tr>
   </thead>
   <tbody>
      @foreach($anggota as $d)
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
         <td>{{ dateID($d->tanggal_daftar) }}</td>
         @endforeach
      </tr>
   </tbody>
</table>
<style>
   @media print {
      @page {
         size: A4;
         margin-top: 20mm;
         margin-bottom: 20mm;
         margin-left: 20mm;
         margin-right: 20mm;
      }
   }
</style>