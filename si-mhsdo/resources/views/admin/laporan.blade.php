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
    <div class="form-group">
      <label for="exampleInputEmail1">Tahun Angkatan</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tahun angkatan">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Semester</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option selected>--Semester terakhir--</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
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
                <th scope="col">No</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">NIM</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Angkatan</th>
                <th scope="col">No.HP Mahasiswa</th>
                <th scope="col">No.Hp Orang Tua</th>
                <th scope="col">IPK</th>
                <th scope="col">Total SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
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
                <td>@mdo</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-outline-warning"><i class="nav-icon fas fa-mail-bulk "></i> <a></a>Kirim Email</button>
        <button type="button" class="btn btn-outline-warning"><i class="nav-icon fab fa-whatsapp "></i> <a></a>Kirim Pesan</button>
      </div>
    </div>
  <!-- /.card-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection