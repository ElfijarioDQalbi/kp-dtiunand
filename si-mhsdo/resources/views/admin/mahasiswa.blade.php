@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mahasiswa</h1>
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
  
    <!-- /.card-header -->
    <div class="card bg-light mb-3">
      <div class="card-header bg-primary">Data Mahasiswa</div>
      <div class="card-body">
        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="staticBackdrop">
          <i class="nav-icon fas fa-folder-open"></i> <a></a>Import Excel
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
              </div>
            </div>
          </div>
        </div> --}}
        <button type="button" class="btn btn-outline-info">
          <i class="nav-icon fas fa-folder-open"></i> <a></a> Import Excel
        </button>
        <button type="button" class="btn btn-outline-info" href="mahasiswa/tambah">
          <i class="nav-icon fas fa-plus-circle"></i> <a></a> Tambah Data
        </button>
          <ol class="float-sm-right">
            <button type="button" class="btn btn-outline-success">
              <i class="nav-icon fas fa-save"></i> <a></a> Simpan</button>
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
        
      </div>
    </div>
  <!-- /.card-body -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
