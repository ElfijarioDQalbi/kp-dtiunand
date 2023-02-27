@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Mahasiswa</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Data Mahasiswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/updatemhs_{{ $mhs->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" placeholder="Masukkan Nama Lengkap Mahasiswa..." class="form-control" value="{{ $mhs->nama }}">
              @error('nama')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>  
          
            <div class="form-group">
              <label>NIM</label>
              <input type="text" name="nim" placeholder="Masukkan NIM Mahasiswa..." class="form-control" value="{{ $mhs->nim }}">
              @error('nim')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>Program Studi</label>
              <input type="text" name="prodi" placeholder="Masukkan Program Studi Mahasiswa..." class="form-control" value="{{ $mhs->prodi }}">
              @error('prodi')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>Fakultas</label>
              <input type="text" name="fakultas" placeholder="Masukkan Fakultas Mahasiswa..." class="form-control" value="{{ $mhs->fakultas }}">
              @error('fakultas')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>Angkatan</label>
              <input type="text" name="angkatan" placeholder="Masukkan Tahun Angkatan...(cth: 2019)" class="form-control" maxlength="4" value="{{ $mhs->angkatan }}">
              @error('angkatan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>No.Hp Mahasiswa</label>
              <input type="telp" name="hp_mahasiswa" placeholder="Masukkan Nomor HP Mahasiswa...(cth: 08526667777)" class="form-control" value="{{ $mhs->hp_mahasiswa }}">
              @error('hp_mahasiswa')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>No.Hp OrangTua/Wali</label>
              <input type="telp" name="hp_ortu" placeholder="Masukkan Nomor HP OrangTua/Wali...(cth: 08526667777)" class="form-control" value="{{ $mhs->hp_ortu }}">
              @error('hp_ortu')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="Masukkan Email Mahasiswa..." class="form-control" value="{{ $mhs->email}}">
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>IPK</label>
                <input type="text" name="ipk" placeholder="Masukkan IPK Terakhir Mahasiswa... (cth:2.75)" class="form-control" value="{{ $mhs->ipk }}">
              </div>
    
              <div class="form-group col-md-6">
                <label>Total SKS</label>
                <input type="text" name="total_sks" placeholder="Masukkan Total SKS Terakhir Mahasiswa..." class="form-control" value="{{ $mhs->total_sks }}">
              </div>
              @error('ipk')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
            <label>Semester</label>
              <div class="form-check ">
                <input class="form-check-input" type="radio" name="semester" id="1Semester" value="3" {{ $mhs->semester == '3'? 'checked' : '' }}>
                  <label class="form-check-label" for="inlineRadio1">Semester 3</label>
              </div>
              <div class="form-check ">
                <input class="form-check-input" type="radio" name="semester" id="2Semester" value="13"{{ $mhs->semester == '13'? 'checked' : '' }}>
                  <label class="form-check-label" for="inlineRadio2">Semester 13</label>
              </div>
              @error('semester')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
    
            <div class="form-group">
            <label>Status</label>
              <div class="form-check ">
                <input class="form-check-input" type="radio" name="status" id="1Status" value="aktif" {{ $mhs->status == 'aktif'? 'checked' : '' }}>
                  <label class="form-check-label" for="inlineRadio1">Aktif</label>
              </div>
              <div class="form-check ">
                <input class="form-check-input" type="radio" name="status" id="2Status" value="cuti" {{ $mhs->status == 'cuti'? 'checked' : '' }}>
                  <label class="form-check-label" for="inlineRadio2">Cuti</label>
              </div>
              @error('status')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            
          </div>
        </form>
        
      </div>
      <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
