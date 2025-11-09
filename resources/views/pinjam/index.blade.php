@extends('layout.app')
@section('konten')

<a href="{{ route('pinjam.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>&nbsp;Tambah</a>
<table id="example1" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>No Pinjam</th>
         <th>Nama Anggota</th>
         <th>Tanggal Pinjam</th>
         <th>Status</th>
         <th>Daftar Buku</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($peminjaman as $d)
      <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $d->no_pinjam }}</td>
         <td>{{ $d->nama_anggota }}</td>
         <td>{{ $d->tanggal_pinjam }}</td>
         <td>
            @if ($d->status == 'pinjam')
            Dipinjam
            @elseif ($d->status == 'sebagian')
            Sebagian
            @else
            Selesai
            @endif
         </td>
         <td>
            @if(isset($detail[$d->id]))
            <ul class="mb-0">
               @foreach($detail[$d->id] as $st)
               <li>
                  {{ $st->judul_buku }}
                  @if($st->status == 'kembali')
                  (Kembali)
                  @else
                  (Dipinjam)
                  @endif
               </li>
               @endforeach
            </ul>
            @endif
         </td>
         <td class="text-center">

            <a href="{{ route('pinjam.view', $d->id) }}" class="btn btn-info btn-sm tombol1" title="Lihat Detail">
               <i class="fa fa-eye"></i>
            </a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
@endsection