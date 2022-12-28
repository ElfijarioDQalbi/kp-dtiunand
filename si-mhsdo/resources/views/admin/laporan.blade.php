@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
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
    <div class="form-group">
      <label for="exampleInputEmail1">Tahun Angkatan</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tahun angkatan">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Semester</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option selected>--Semester terakhir--</option>
        <option>3</option>
        <option>13</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">IPK</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option selected>--IPK semester terakhir--</option>
        <option>Kurang dari 2.00</option>
        <option>Lebih dari 2.00</option>
      </select>
    </div>
    <button type="button" class="btn btn-outline-info">
      <i class="nav-icon fas fa-eye"></i> <a></a> Tampilkan
    </button>

    <p></p>
    <!-- /.card-header -->
    <div class="card bg-light mb-3">
      <div class="card-header bg-primary">Data Mahasiswa Angkatan .... Semester ....</div>
      <div class="card-body">
          <ol class="float-sm-right">
            <button type="button" class="btn btn-outline-success">
              <i class="nav-icon fas fa-print"></i> <a></a> Cetak</button>
          </ol>
        <p></p>
        <!--table-->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Mahasiswa</th>
                <th scope="col" class="text-center">NIM</th>
                <th scope="col" class="text-center">Angkatan</th>
                <th scope="col" class="text-center">Program Studi</th>
                <th scope="col" class="text-center">Fakultas</th>
                <th scope="col" class="text-center">Semester</th>
                <th scope="col" class="text-center">IPK</th>
                <th scope="col" class="text-center">Total SKS</th>
                <th scope="col" class="text-center">Masa Studi</th>
                <th scope="col" class="text-center">No.HP OrangTua/Wali</th>
                <th scope="col" class="text-center">No.HP Mahasiswa</th>
                <th scope="col" class="text-center">Email Mahasiswa</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Evaluasi</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- <div {{ $i = 1 }}> </div>
              @foreach ($mahasiswa as $mhs)
              <tr>
                <td class="text-center">{{ $i++}}</td>
                <td><p>{{ $mhs->nama }}</p></td>
                <td><p>{{ $mhs->nim }}</p></td>
                <td><p>{{ $mhs->angkatan }}</p></td>
                <td><p>{{ $mhs->prodi }}</p></td>
                <td><p>{{ $mhs->fakultas }}</p></td>
                <td><p>{{ $mhs->semester }}</p></td>
                <td><p>{{ $mhs->ipk }}</p></td>
                <td><p>{{ $mhs->total_sks }}</p></td>
                <td><p>{{ $mhs->masa_studi}}</p></td>
                <td><p>{{ $mhs->hp_ortu }}</p></td>
                <td><p>{{ $mhs->hp_mahasiswa }}</p></td>
                <td><p>{{ $mhs->email }}</p></td>
                <td><p>{{ $mhs->status }}</p></td>
                <td><p>{{ $mhs->evaluasi }}</p></td>
                <td>
                  <button type="button" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></button>
                  <button type="button" class="btn btn-outline-danger btn-xs"><i class="av-icon fas fa-trash "></i></button>
                </td>
              </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
        <!--/table-->
    </div>
  <!-- /.card-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection