@extends('layouts.master')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<!-- icons bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Akun Administrator</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if ($message = Session::get('success-hapus'))
    <div class="alert alert-danger" role="alert">
      {{ $message }}
    </div>
    @endif
      <div class="row">
        <div class="col-4">
          <div class="register-box">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a class="h4"><b>Sistem Informasi Peringatan Dini Drop Out Mahasiswa</b></a>
              </div>
              <div class="card-body">
                @if ($message = Session::get('gagal-register'))
                <div class="alert alert-danger" role="alert"><i class="nav-icon fas fa-window-close mr-1"></i>
                    {{ $message }}
                </div>
                @elseif ($message = Session::get('success-register'))
                <div class="alert alert-success" role="alert"><i class="nav-icon fas fa-check-circle mr-1"></i>
                    {{ $message }}
                </div>
                @endif
                <p class="login-box-msg">Register a new admin</p>
          
                <form action="/registeruser" method="post">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Username...">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email...">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3" id="show_hide_password" >
                    <input type="password" id="id_password" class="form-control" placeholder="Password..." name="password" required autocomplete="current-password">
                    <div class="input-group-append" >
                      <div class="input-group-text" >
                        <a href=""><i class="bi bi-eye-slash-fill" aria-hidden="true"></i></a>
                      </div>
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                {{-- <a href="/login" class="text-center">I already have a account</a> --}}
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>
        </div>
        <div class="col-8">
          <div class="card bg-white mb-3">
            <div class="card-header bg-primary">Data Akun Admin
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
        
              <p></p>
              <form action="{{ route('exportmhsselected')}}" method="GET">
                @csrf
                <!--table-->
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        {{-- <th class="text-center"><input type="checkbox" onchange="selectAll(this)" id="chkAll" ></th> --}}
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">Email</th>
                        {{-- <th scope="col" class="text-center">Password</th> --}}
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <div {{ $i = 1 }}> </div> --}}
                      @foreach ($admin as $adm)
                      <tr>
                        {{-- <td class="text-center"><input type="checkbox" class="allmhs" name="ids[{{ $mhsiswa->id }}]" value="{{ $mhsiswa->id }}"></td> --}}
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><p>{{ $adm->name }}</p></td>
                        <td><p>{{ $adm->email }}</p></td>
                        {{-- <td><p>{{ $adm->password }}</p></td> --}}
                        <td class="text-center">
                          {{-- <a href="/editmhs_{{ $mhsiswa->id }}" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></a> --}}
                          <a href="/deleteadm_{{ $adm->id }}" class="btn btn-outline-danger btn-xs"><i class="nav-icon fas fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    
    

    <!-- /.card-header -->
    {{-- <div class="card bg-light mb-3">
      <div class="card-header bg-primary">Data Akun Admin</div>
      <div class="card-body">
        <button type="button" class="btn btn-outline-info" href="mahasiswa/tambah">
          <i class="nav-icon fas fa-plus-circle"></i> <a></a> Tambah Data
        </button>
        <p></p>
        <!--table-->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Admin</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                  <button type="button" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></button>
                  <button type="button" class="btn btn-outline-danger btn-xs"><i class="av-icon fas fa-trash "></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                  <button type="button" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></button>
                  <button type="button" class="btn btn-outline-danger btn-xs"><i class="av-icon fas fa-trash "></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>
                  <button type="button" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></button>
                  <button type="button" class="btn btn-outline-danger btn-xs"><i class="av-icon fas fa-trash "></i></button>
                </td>
                </tr>
            </tbody>
          </table>
        </div>
        
      </div>
    </div> --}}
  <!-- /.card-body -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
  $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_password input').attr("type") == "text"){
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass( "bi bi-eye-slash-fill" );
          $('#show_hide_password i').removeClass( "bi bi-eye-fill" );
      }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass( "bi bi-eye-slash-fill" );
          $('#show_hide_password i').addClass( "bi bi-eye-fill" );
      }
  });
  });
</script>
     
@endsection
