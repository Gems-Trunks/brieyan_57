<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-light"><b>PERPU</b>STMIK</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">
               @if(Auth::user()->level === 'admin')
               Administrator
               @elseif(Auth::user()->level === 'user')
               Petugas
               @else
               Guest
               @endif
            </a>
         </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
               <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>

            @if(auth()->user()->level === 'admin')
            <!-- tambahi -->
            <li class="nav-item menu-open">
               <a href="{{ route('anggota.index')}}" class=" {{ Route::is('anggota.*') ? 'active' : '' }} nav-link ">
                  <i class=" nav-icon fas fa-address-card"></i>
                  <p>
                     Data Anggota
                  </p>
               </a>
            </li>
            <li class="nav-item menu-open">
               <a href="{{ route('buku.index')}}"
                  class=" {{ Route::is('buku.*') && !Route::is('buku.kategori.*') ? 'active' : '' }} nav-link ">
                  <i class=" nav-icon fas fa-book"></i>
                  <p>
                     Data Buku
                  </p>
               </a>
            </li>
            <li class="nav-item menu-close">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>&nbsp;Data Master<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('kategori.index')}}"
                        class="{{ Route::is('buku.*') && !Route::is('buku.kategori.*') ? 'active' : '' }} nav-link "
                        style="margin-left:37px">
                        <p>Kategori Buku</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('rak.index')}}"
                        class="{{ Route::is('buku.*') && !Route::is('buku.kategori.*') ? 'active' : '' }} nav-link"
                        class="nav-link" style="margin-left:37px;">
                        <p>Rak Buku</p>
                     </a>
                  </li>
               </ul>
            </li>
            @endif
            <!-- tambahi -->
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>