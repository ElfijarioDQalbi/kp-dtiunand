@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Mahasiswa</h1>
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
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Mahasiswa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/insertmahasiswa" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">NIM</label></label>
            <input type="number" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIM">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Fakultas</label>
          <input type="text" name="fakultas" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Fakultas">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Program Studi</label>
            <select class="custom-select" name="prodi">
              <option selected ></option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Kompoter">Teknik Kompoter</option>
              <option value="Informatika">Informatika</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Angkatan</label>
            <input type="number" name="angkatan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tahun Angkatan">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Masa Studi</label>
          <select class="custom-select" name="masa_studi">
            <option selected >Pilih</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No.HP Mahasiswa</label>
            <input type="number" name="hp_mahasiswa" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomoor Handphone Mahasiswa">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No.HP OrangTua/Wali</label>
            <input type="number" name="hp_ortu" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Handphone OrangTua/Wali">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IPK</label>
            <input type="text" name="ipk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah IPK Terakhir">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Total SKS</label>
            <input type="text" name="total_sks" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Total SKS Terakhir">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Semester</label>
            <input type="number" name="semester" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Semester Terakhir">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <select class="custom-select" name="status">
            <option selected >Pilih</option>
            <option value="aktif">Aktif</option>
            <option value="tidak aktif">Tidak Aktif</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Evaluasi</label>
          <input type="text" name="evaluasi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Semester Terakhir">
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