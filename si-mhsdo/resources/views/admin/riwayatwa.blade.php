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
          <button type="submit" class="btn btn-dark mt-2"><i class="nav-con fas fa-search"></i> Search</button>
        </form>
      </div>
      

      <div class="card bg-white mb-3 mt-4">
        <div class="card-header bg-primary">
          Riwayat pesan pada waktu : <b>{{ $data->date }}</b>
        </div>
        <div class="card-body">

          <!--table-->
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col-auto" class="text-center">No</th>
                  <th scope="col-auto" class="text-center">Nomor WA</th>
                  <th scope="col-auto" class="text-center">Jenis Pesan</th>
                  <th scope="col-auto" class="text-center">Isi Pesan</th>
                  <th scope="col-auto" class="text-center">Status Pesan</th>
                </tr>
              </thead>
              <tbody>
                {{-- <div {{ $i = 1 }}> </div> --}}
                @if(count($data->message) > 0)
                  @foreach ($data->message as $item)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td><p>{{$item->phone->to}}</p></td>
                    <td><p>{{$item->category}}</p></td>
                    <td><p>{{$item->text}}</p></td>
                    <td class="text-center">
                      @if (($item->status == 'sent'))
                        <span class="badge badge-pill badge-success">Sent</span>
                      @elseif (($item->status == 'read'))
                        <span class="badge badge-pill badge-primary">Read</span>
                      @elseif (($item->status == 'cancel'))
                        <span class="badge badge-pill badge-danger">Cancel</span>
                      @else
                        <span class="badge badge-pill badge-secondary">{{ $item->status }}</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="5" class="text-center"><b><i>Tidak Ada Pesan Yang Dikirimkan Pada Waktu Tersebut</i></b></td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection