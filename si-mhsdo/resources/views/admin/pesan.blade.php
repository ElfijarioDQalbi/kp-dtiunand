@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kirim Pesan via WhatsApp</h1>
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
  <div class="card bg-light mb-3 ">
    <div class="card-header bg-primary">
      Kirim Peringatan ke Mahasiswa via WhatsApp
    </div>
    <div class="card-body">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
      @endif
      <form action="{{ url('pesan') }}" method="POST">
        @csrf
      <!--table-->
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col" class="text-center">Nama Mahasiswa</th>
              <th scope="col" class="text-center">Program Studi</th>
              <th scope="col" class="text-center">Nomor WhatsApp</th>
            </tr>
          </thead>        
          <tbody>
            <div {{ $i = 1 }}> </div>
            @foreach ($mahasiswa as $data)
            <tr>
              <td class="text-center">{{ $i++}}</td>
              <td><p>{{ $data->nama }}</p></td>
              <td><p>{{ $data->prodi }}</p></td>
              <td><p>{{ $data->hp_mahasiswa }}</p></td>
            </tr>
            @endforeach
          </tbody>     
        </table>
      </div>
    
        <div class="form-group">
          <label for="\">Pesan</label>
            <textarea name="pesan" class="form-control" cols="30" rows="5" placeholder="Pesan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="card-footer">
  
    </div>
  </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
