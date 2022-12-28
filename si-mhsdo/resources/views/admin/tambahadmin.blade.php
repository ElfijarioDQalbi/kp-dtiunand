@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Admin</h1>
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
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Admin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Mahasiswa</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">NIM</label></label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIM">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Program Studi</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Prodi">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Fakultas</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Fakultas">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Angkatan</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tahun Angkatan">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No.HP Mahasiswa</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomoor Handphone Mahasiswa">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No.HP OrangTua/Wali</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomoor Handphone OrangTua/Wali">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IPK</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah IPK Terakhir">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Total SKS</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Total SKS Terakhir">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Semester</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Semester Terakhir">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection