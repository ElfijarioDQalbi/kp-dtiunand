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
    </div>
  </section>
  <div class="card-body">
    @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
    @endif
  

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
             
              <th scope="col" class="text-center">No</th>
              <th scope="col" class="text-center">Nama Akun API</th>
              <th scope="col" class="text-center">Kode Akun</th>
              <th scope="col" class="text-center">Status API</th>
            </tr>
          </thead>        
          <tbody>
            {{-- <div {{ $i = 1 }}> </div> --}}
            <tr>
              
              <td class="text-center"></td>
              <td>{{$api['data']['name']}}</td>
              <td>{{$api['data']['serial']}}</td>
              <td>{{$api['data']['status']}}</td>
            </tr>
          </tbody>     
        </table>

  </div>
</div




  <!-- Main content -->
  <section class="content">
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
          <div class="col-auto mt-3">
            <button class="btn btn-dark"><i class="nav fas fa-search ml-1"></i>Cari</button>
          </div>
      </div>
    </form>

    <div class="card bg-white mb-3 mt-4">
      <div class="card-header bg-primary">
        Kirim Peringatan ke Mahasiswa via WhatsApp
      </div>
      <div class="card-body">
        
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
                </tr>
              </thead>        
              <tbody>
                {{-- <div {{ $i = 1 }}> </div> --}}
                @foreach ($mhs as $index => $mhsiswa)
                <tr>
                  <td class="text-center"><input type="checkbox" class="allmhs" name="ids[{{ $mhsiswa->id }}]" value="{{ $mhsiswa->id }}"></td>
                  <td class="text-center">{{ $index + $mhs->firstItem() }}</td>
                  <td><p>{{ $mhsiswa->nama }}</p></td>
                  <td><p>{{ $mhsiswa->prodi }}</p></td>
                  <td><p>{{ $mhsiswa->hp_mahasiswa }}</p></td>
                </tr>
                @endforeach
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
