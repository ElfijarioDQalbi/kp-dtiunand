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
    @if ($message = Session::get('success-i'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @elseif ($message = Session::get('success-e'))
    <div class="alert alert-warning" role="alert">
      {{ $message }}
    </div>
    @elseif ($message = Session::get('success-d'))
    <div class="alert alert-danger" role="alert">
      {{ $message }}
    </div>
    @endif
    @error('ids')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    

    <form action="{{ route('indexmahasiswa') }}" method="GET">
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

    <!--.card-header -->
    <div class="card bg-white mb-3 mt-4">
      <div class="card-header bg-primary">Data Mahasiswa</div>
      <div class="card-body">
        <a class="btn btn-primary" href="{{ route('createmhs') }}">
          <i class="nav-icon fas fa-plus-circle"></i> Add Data </a>
        
        <!-- Button import modal -->
        <a type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
          <i class="nav-icon fas fa-folder-open"></i> Import Excel
        </a>

       
        <ol class="float-sm-right">
          <a class="btn btn-outline-success" href="{{ route('exportmhs') }}">
            <i class="nav-icon fas fa-print"></i> Export All </a>
        </ol>
  
        <p></p>
        <form action="{{ route('exportmhsselected')}}" method="GET">
          @csrf
          <!--table-->
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="text-center"><input type="checkbox" onchange="selectAll(this)"/ ></th>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Nama Mahasiswa</th>
                  <th scope="col" class="text-center">NIM</th>
                  <th scope="col" class="text-center">Angkatan</th>
                  <th scope="col" class="text-center">Program Studi</th>
                  <th scope="col" class="text-center">Fakultas</th>
                  <th scope="col" class="text-center">Semester</th>
                  {{-- <th scope="col" class="text-center">IPK</th>
                  <th scope="col" class="text-center">Total SKS</th>
                  <th scope="col" class="text-center">Masa Studi</th>
                  <th scope="col" class="text-center">No.HP OrangTua/Wali</th>
                  <th scope="col" class="text-center">No.HP Mahasiswa</th>
                  <th scope="col" class="text-center">Email Mahasiswa</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-center">Evaluasi</th> --}}
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                {{-- <div {{ $i = 1 }}> </div> --}}
                @foreach ($mhs as $index => $mhsiswa)
                <tr>
                  <td class="text-center"><input type="checkbox" class="allmhs" name="ids[{{ $mhsiswa->id }}]" value="{{ $mhsiswa->id }}"></td>
                  <td class="text-center">{{ $index + $mhs->firstItem() }}</td>
                  <td><p>{{ $mhsiswa->nama }}</p></td>
                  <td><p>{{ $mhsiswa->nim }}</p></td>
                  <td><p>{{ $mhsiswa->angkatan }}</p></td>
                  <td><p>{{ $mhsiswa->prodi }}</p></td>
                  <td><p>{{ $mhsiswa->fakultas }}</p></td>
                  <td><p>{{ $mhsiswa->semester }}</p></td>
                  {{-- <td><p>{{ $mhsiswa->ipk }}</p></td>
                  <td><p>{{ $mhsiswa->total_sks }}</p></td>
                  <td><p>{{ $mhsiswa->masa_studi}}</p></td>
                  <td><p>{{ $mhsiswa->hp_ortu }}</p></td>
                  <td><p>{{ $mhsiswa->hp_mahasiswa }}</p></td>
                  <td><p>{{ $mhsiswa->email }}</p></td>
                  <td><p>{{ $mhsiswa->status }}</p></td>
                  <td><p>{{ $mhsiswa->evaluasi }}</p></td> --}}
                  <td class="text-center">
                    <a href="/detailmhs_{{ $mhsiswa->id }}" class="btn btn-outline-info btn-xs"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="/editmhs_{{ $mhsiswa->id }}" class="btn btn-outline-warning btn-xs"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="/deletemhs_{{ $mhsiswa->id }}" class="btn btn-outline-danger btn-xs"><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <button id="btn" type="submit" class="btn btn-outline-success mb-3"><i class="nav-icon fas fa-print mr-1"></i>Export Selected</button>
            {{-- <input type="submit" value="exporttable"> --}}
            {{ $mhs->withQueryString()->links() }}
          </div>
        </form>
        
      </div>
    </div>
  <!-- /.card-body -->

  <!-- Modal Import Data -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import File Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('importmhs') }}" method="POST" enctype="multipart/form-data">
          @csrf
        
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="excel_file" required >
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--javascript-->
<script>
  //select-all-checkbox
  function selectAll(input){
    let checkboxes = document.querySelectorAll('.allmhs');
    checkboxes.forEach(function(checkbox){
      checkbox.checked= input.checked;
    })
  }

  // //checkbox-export
  // function selectexport(){
  //   var check = document.getElementById("check");
  //   var btn = document.getElementById("btn");

  //   if(check.checked){
  //     btn.removeAttribute("disabled");
  //   } else{
  //     btn.disabled="true";
  //   } 
  // }

</script>

@endsection