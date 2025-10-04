@extends('layout.style_script')

<div class="login-page hold-transition">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
         <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>PERPU</b>SMTIK</a>
         </div>
         <div class="card-body">
            <p class="login-box-msg">HALAMAN LOGIN PERPUS STMIK</p>

            <form action="{{ route('login_proses')}}" method="post">
               @csrf
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="username">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-14">
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
               </div>
               <!-- /.col -->
         </div>
         </form>

         <!-- /.social-auth-links -->

      </div>
      <!-- /.card-body -->
   </div>
   <!-- /.card -->
</div>
</div>
<!-- /.login-box -->