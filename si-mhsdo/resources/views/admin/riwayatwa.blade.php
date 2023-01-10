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
        <input type="date" name="date">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <p>riwayat pesan tanggal {{ $data->date }}</p>
                <div >
                    <table >
                        <thead>
                            <tr>
                                <th>nomor</th>
                                <th>kategori</th>
                                <th>Pesan</th>
                                <th>Status pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($data->message as $item)
                            <tr>
                            <td>{{$item->phone->to}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->text}}</td>
                            <td>{{$item->status}}</td>
                            {{-- <td>{{$pesan['deviceID']}}</td> --}}
                            </tr>
                            @endforeach
                            
                            
                            <tr>
                                
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
  </section>
    </div>
@endsection