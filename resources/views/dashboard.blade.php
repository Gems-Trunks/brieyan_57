@extends('layout.app')
@section('konten')
<div class="container-fluid">
   <div class="row g-3">
      <div class="col-lg-3 col-6">
         <div class="small-box bg-info text-white">
            <div class="inner">
               <h3>{{ $jumlahAnggota }}</h3>
               <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
               <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('anggota.index') }}" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
            </a>
         </div>
      </div>

      <!-- Card Jumlah Buku -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-danger text-white">
            <div class="inner">
               <h3>{{ $jumlahBuku }}</h3>
               <p>Jumlah Buku</p>
            </div>
            <div class="icon">
               <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('buku.index') }}" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
            </a>
         </div>
      </div>

      <!-- Card Buku Dipinjam -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-success text-white">
            <div class="inner">
               <h3>{{ $bukuDipinjam }}</h3>
               <p>Buku Dipinjam</p>
            </div>
            <div class="icon">
               <i class="fa fa-book-reader"></i>
            </div>
            <a href="{{ route('pinjam.index') }}" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
            </a>
         </div>
      </div>

      <!-- Card Buku Tersedia -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-warning text-dark">
            <div class="inner">
               <h3>{{ $bukuTersedia }}</h3>
               <p>Buku Tersedia</p>
            </div>
            <div class="icon">
               <i class="fa fa-book-open"></i>
            </div>
            <a href="{{ route('buku.index') }}" class="small-box-footer text-dark">
               More info <i class="fa fa-arrow-circle-right"></i>
            </a>
         </div>
      </div>
   </div>
</div>
@endsection