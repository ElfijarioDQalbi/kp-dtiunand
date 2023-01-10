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
            </div>
          </div>
        </section>

        <!-- Main content -->
  <section class="content">
        <form action="/api2" method="get">
        <input type="date" class="form-control" name="date">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        

        <div class="card bg-white mb-3 mt-4">
          <div class="card-header bg-primary">
            <p>Riwayat pesan tanggal {{ $data->date }}</p>
          </div>
          <div class="card-body">

<!--table-->
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">No</th>
        <th scope="col" class="text-center">Nomor WA</th>
        <th scope="col" class="text-center">Jenis Pesan</th>
        <th scope="col" class="text-center">Isi Pesan</th>
        <th scope="col" class="text-center">Status Pesan</th>
      </tr>
    </thead>
    <tbody>
      {{-- <div {{ $i = 1 }}> </div> --}}
      @foreach ($data->message as $item)
      <tr>
        <td class="text-center"></td>
        <td><p>{{$item->phone->to}}</p></td>
        <td><p>{{$item->category}}</p></td>
        <td><p>{{$item->text}}</p></td>
        <td><p>{{$item->status}}</p></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
        <div class="row">
            <div class="col-md-12">
                <p></p>
                <div >
                    
                </div>

            </div>
        </div>
  </section>
    </div>
@endsection