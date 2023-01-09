<!DOCTYPE html>
<html>
<head>
    <title>riwayat pesan </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <form action="/api2" method="get">
        <input type="date" name="date">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <p>riwayat pesan tanggal {{ $data->date }}</p>
                <div class="table-responsive">
                    <table class="table table-hover">
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

</body>
</html>