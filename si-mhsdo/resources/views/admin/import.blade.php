<div class="container mt-4">
    <form action="{{ url('importexcel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-5">
                <input type="file" name="file" class="form-control" required>
            </div>
            <div class="col-lg-1">
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    <br><br>
    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $item)
            <tr>
                <td>{{ $k+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>