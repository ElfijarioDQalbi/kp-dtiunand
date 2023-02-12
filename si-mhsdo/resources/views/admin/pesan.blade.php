@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kirim Pesan Peringatan via WhatsApp</h1>
        </div>
    </div>
  </section>

  
    

  <!-- Main content -->
  <section class="content">

    <div class="col-md-8">
      <div class="card bg-white mb-3">
        <div class="card-header bg-primary">
          Koneksi Sistem dengan API WhatsApp
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
  
        <div class="card-body">
          <!--table-->
          <div class="table-responsive mt-3">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th scope="col" class="text-center">Nama Akun API</th>
                <th scope="col" class="text-center">Kode Akun</th>
                <th scope="col" class="text-center">Status API</th>
              </tr>
              </thead>        
              <tbody>
                <tr> 
                  <td>{{$api['data']['name']}}</td>
                  <td>{{$api['data']['serial']}}</td>
                  <td><span class="badge badge-pill badge-success">{{$api['data']['status']}}</span></td>
                </tr>
              </tbody>     
            </table>
          </div>
        </div>
      </div>
    </div>
    

    <form action="{{ route('indexpesanwa') }}" method="GET">
      @csrf
      <div class="row g-3 align-items-center ml-1">  
          <div class="col-auto">
            <label class="col-form-label ml-2">Angkatan</label>
            <input type="text" name="aktn" class="form-control" placeholder="Cari tahun angkatan..." value="{{ isset($_GET['angkatan']) ? $_GET['angkatan'] : '' }}" >
          </div>
          <div class="col-auto">
            <label class="col-form-label ml-2">Semester :</label>
            <select class="form-control" name="smester">
              <option value="3" selected="{{ isset($_GET['semester']) && $_GET['semester'] == '' }}" >3</option>
              <option value="13" selected="{{ isset($_GET['semester']) && $_GET['semester'] == '' }}" >13</option>
              <option value=""selected>=== Semester terakhir ===</option>
            </select>
          </div>
          <div class="col-auto">
            <label class="col-form-label ml-2">Fakultas :</label>
            <select class="form-control" name="fkltas">
              <option value="Pertanian" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Pertanian' }}">Pertanian</option>
              <option value="Kedokteran" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Kedokteran' }}">Kedokteran</option>
              <option value="Hukum" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Hukum' }}">Hukum</option>
              <option value="Matematika dan Ilmu Pengetahuan Alam" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Matematika dan Ilmu Pengetahuan Alam' }}">Matematika dan Ilmu Pengetahuan Alam</option>
              <option value="Ekonomi dan Bisnis" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Ekonomi dan Bisnis' }}">Ekonomi dan Bisnis</option>
              <option value="Peternakan" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Peternakan' }}">Peternakan</option>
              <option value="Ilmu Budaya" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Ilmu Budaya' }}">Ilmu Budaya</option>
              <option value="Ilmu Sosial dan Ilmu Politik" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Ilmu Sosial dan Ilmu Politik' }}">Ilmu Sosial dan Ilmu Politik</option>
              <option value="Teknik" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Teknik' }}">Teknik</option>
              <option value="Farmasi" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Farmasi' }}">Farmasi</option>
              <option value="Teknologi Pertanian" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Teknologi Pertanian' }}">Teknologi Pertanian</option>
              <option value="Keperawatan" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Keperawatan' }}">Keperawatan</option>
              <option value="Kesehatan Masyarakat" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Kesehatan Masyarakat' }}">Kesehatan Masyarakat</option>
              <option value="Teknologi Informasi" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Teknologi Informasi' }}">Teknologi Informasi</option>
              <option value="Kedokteran Gigi" selected="{{ isset($_GET['fakultas']) && $_GET['fakultas'] == 'Kedokteran Gigi' }}">Kedokteran Gigi</option>
              <option value=""selected>============ Pilih Fakultas ============</option>
            </select>
          </div>
          <div class="col-auto">
            <label class="col-form-label ml-2">Status Evaluasi :</label>
            <select class="form-control" name="eval">
              <option value="terancam do" selected="{{ isset($_GET['evaluasi']) && $_GET['evaluasi'] == 'terancam do' }}">Terancam Drop Out</option>
              <option value="aman" selected="{{ isset($_GET['evaluasi']) && $_GET['evaluasi'] == 'aman' }}">Aman</option>
              <option value=""selected>===== Pilih Status Evaluasi =====</option>
            </select>
          </div>
          <div class="col-auto mt-3">
            <button class="btn btn-dark"><i class="nav-con fas fa-search"></i> Search</button>
          </div>
      </div>
    </form>

    <div class="card bg-white mb-3 mt-4">
      <div class="card-header bg-primary">
        Kirim Peringatan ke Mahasiswa via WhatsApp
      </div>
      <div class="card-body">
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{ session()->get('message') }}
          </div>
        @endif

        <form action="{{ route('kirimpesan')}}" method="post">
          @csrf
          <!--table-->
          <div class="table-responsive mt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  {{-- <th style="width:10px;">
                    <div class="incheck-primary d-inline">
                      <input wire:model="selectedRows" type="checkbox" value="{{ $mhs->id }}" name="todo2" id="{{ $$mhs->id }}">
                      <label for="{{ $mhs->id }}"></label>
                    </div>
                  </th> --}}
                  <th class="text-center"><input type="checkbox" onchange="selectAll(this)"/ ></th>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Nama Mahasiswa</th>
                  <th scope="col" class="text-center">Program Studi</th>
                  <th scope="col" class="text-center">Nomor WhatsApp</th>
                  <th scope="col" class="text-center">Evaluasi</th>
                </tr>
              </thead>        
              <tbody>
                {{-- <div {{ $i = 1 }}> </div> --}}
                @if(count($mhs) > 0)
                  @foreach ($mhs as $index => $mhsiswa)
                  <tr>
                    <td class="text-center"><input type="checkbox" class="allmhs" name="ids[{{ $mhsiswa->id }}]" value="{{ $mhsiswa->id }}"></td>
                    <td class="text-center">{{ $index + $mhs->firstItem() }}</td>
                    <td><p>{{ $mhsiswa->nama }}</p></td>
                    <td><p>{{ $mhsiswa->prodi }}</p></td>
                    <td><p>{{ $mhsiswa->hp_mahasiswa }}</p></td>
                    <td class="text-center">
                      @if(($mhsiswa->evaluasi == 'aman'))
                        <span class="badge badge-success">Aman</span>
                      @else
                        <span class="badge badge-danger">Terancam DO</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="6" class="text-center"><b><i>Data Tidak Ditemukan</i></b></td>
                </tr>
                @endif
              </tbody>     
            </table>
            {{ $mhs->withQueryString()->links() }}
          </div>
          <div class="form-group">
            <label for="\">Pesan</label>
              <textarea name="pesan" class="form-control bg-light" cols="30" rows="5" placeholder="Pesan"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" value="exporttable" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
          </div>
        </form>

      </div>
      <div class="card-footer">
    
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--js checkbox selectall-->
<script>
  function selectAll(input){
    let checkboxes = document.querySelectorAll('.allmhs');
    checkboxes.forEach(function(checkbox){
      checkbox.checked= input.checked;
    })
  }
</script>


@endsection
