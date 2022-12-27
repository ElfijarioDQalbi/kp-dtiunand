@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pesan</h1>
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
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="contact-form">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                    <form action="{{ url('pesan') }}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                        <div class="form-group">
                            <label for="\">No WA</label> 
                              @foreach ($mahasiswa as $data)
                                  <p>{{ $data->hp_mahasiswa }}</p>
                              @endforeach
                        </div>
                      </div>
                    </div>   
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="\">Nama Mahasiswa</label>
                            @foreach ($mahasiswa as $data)
                                <p>{{ $data->nama }}</p>
                            @endforeach
                          </div>
                      </div>
                        <div class="form-group">
                            <label for="\">Pesan</label>
                            <textarea name="pesan" class="form-control" cols="30" rows="5" placeholder="Pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </html>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

     
@endsection
