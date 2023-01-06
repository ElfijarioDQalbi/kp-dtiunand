@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Data Mahasiswa</h1>
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

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-7">
          <div class="card">
            <div class="card-header bg-primary"> 
              Detail Data Mahasiswa
            </div>
            <div class="card-body center">
              
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" placeholder="Masukkan Nama Lengkap Mahasiswa..." class="form-control" value="{{ $mhs->nama }}" disabled>
                </div>
              </div>
            
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">NIM</label>
                <div class="col-sm-8">
                  <input type="text" name="nim" placeholder="Masukkan NIM Mahasiswa..." class="form-control" value="{{ $mhs->nim }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Program Studi</label>
                <div class="col-sm-8">
                  <input type="text" name="prodi" placeholder="Masukkan Program Studi Mahasiswa..." class="form-control" value="{{ $mhs->prodi }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fakultas</label>
                <div class="col-sm-8">
                  <input type="text" name="fakultas" placeholder="Masukkan Fakultas Mahasiswa..." class="form-control" value="{{ $mhs->fakultas }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Angkatan</label>
                <div class="col-sm-8">
                  <input type="text" name="angkatan" placeholder="Masukkan Tahun Angkatan...(cth: 2019)" class="form-control" maxlength="4" value="{{ $mhs->angkatan }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">No.Hp Mahasiswa</label>
                <div class="col-sm-8">
                  <input type="telp" name="hp_mahasiswa" placeholder="Masukkan Nomor HP Mahasiswa...(cth: 08526667777)" class="form-control" value="{{ $mhs->hp_mahasiswa }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">No.Hp OrangTua/Wali</label>
                <div class="col-sm-8">
                  <input type="telp" name="hp_ortu" placeholder="Masukkan Nomor HP OrangTua/Wali...(cth: 08526667777)" class="form-control" value="{{ $mhs->hp_ortu }}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" name="email" placeholder="Masukkan Email Mahasiswa..." class="form-control" value="{{ $mhs->email}}" disabled>
                </div>
              </div>

              <div class="form-group row ">
                <label class="col-sm-4 col-form-label">IPK</label>
                <div class="col-sm-8">
                  <input type="text" name="ipk" placeholder="Masukkan IPK Terakhir Mahasiswa... (cth:2.75)" class="form-control" value="{{ $mhs->ipk }}" disabled>
                </div>
              </div>
    
              <div class="form-group row ">
                <label class="col-sm-4 col-form-label">Total SKS</label>
                <div class="col-sm-8">
                  <input type="text" name="total_sks" placeholder="Masukkan Total SKS Terakhir Mahasiswa..." class="form-control" value="{{ $mhs->total_sks }}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Semester</label>
                <div class="col-sm-8">
                  <input type="text" name="semester" placeholder="Masukkan Email Mahasiswa..." class="form-control" value="Semester {{ $mhs->semester}}" disabled>
                </div>
              </div>
      
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Masa Studi</label>
                <div class="col-sm-8">
                  <input type="text" name="masa_studi" placeholder="Masukkan Masa Studi..." class="form-control" value="{{ $mhs->masa_studi }}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <input type="text" name="status" placeholder="Masukkan Masa Studi..." class="form-control" value="{{ $mhs->status }}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Evaluasi</label>
                <div class="col-sm-8">
                  <input type="text" name="evaluasi" placeholder="Masukkan Masa Studi..." class="form-control" value="{{ $mhs->evaluasi }}" disabled>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </div>
    </div>
      
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
