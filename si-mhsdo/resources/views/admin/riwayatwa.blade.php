@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Riwayat Pesan via WhatsApp</h1>
            </div>
          </div>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="form-group ml-2 mt-3">
        <form action="/riwayatwa" method="get">
          <label class="ml-2">Waktu Pengiriman Pesan </label>
          <input type="date" class="form-control col-md-6" name="date">
          <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
      </div>
      

      <div class="card bg-white mb-3 mt-4">
        <div class="card-header bg-primary">
          Riwayat pesan pada waktu : {{ $data->date }}
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
                  <td class="text-center">{{ $loop->iteration }}</td>
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
    </section>
  </div>
@endsection