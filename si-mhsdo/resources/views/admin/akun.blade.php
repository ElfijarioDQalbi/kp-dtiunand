@extends('layouts.master')

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
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.card-header -->
    <div class="card bg-light mb-3">
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
    </div>
  <!-- /.card-body -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
