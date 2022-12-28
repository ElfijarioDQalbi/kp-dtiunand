@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kirim Pesan via Email</h1>
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
        <form action="{{ route('send.email') }}" method="POST">
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
                <td><p>{{ $data->email}}</p></td>
              </tr>
              @endforeach
            </tbody>     
          </table>
        </div>
        

          <div class="form-group">
						<label for="inputSubject">Subject</label>
              <input type="text" name="subject" class="form-control" placeholder="Masukkan Subject Email...">
                @error('subject')
                  <span class="text-danger"> {{ $message }} </span>
                @enderror
					</div>
          <div class="form-group">
            <label for="\">Pesan</label>
              <textarea name="pesan" class="form-control" cols="30" rows="5" placeholder="Pesan"></textarea>
          </div>
          <div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
					</div>  
        </form>
      </div>
      <div class="card-footer">
    
      </div>
    </div>
    </section>
    <!-- /.content -->

  {{-- <section class="content">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="contact-form">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ route('send.email') }}" method="post">
                @csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputName">Name</label>
                                @foreach ($mahasiswa as $data)
                                  <p>{{ $data->nama }}</p>
                              @endforeach
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail">Email</label>
                                @foreach ($mahasiswa as $data)
                                <p>{{ $data->email }}</p>
                            @endforeach
							</div>
						</div>
					</div>            
					<div class="form-group">
						<label for="inputSubject">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Peringatan Mahasiswa DO ">
                        @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
					</div>
					<div class="form-group">
						<label for="inputMessage">Message</label>
                        <textarea name="content" rows="5" class="form-control" placeholder="Enter Your Message"></textarea>
                        @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
					</div>            
				</form>
			</div>
		</div>
	</div>
</section> --}}
</div>
<!-- /.content-wrapper -->
@endsection