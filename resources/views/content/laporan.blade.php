<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
</head>
<body>
    {{-- CONTENT --}}
    <div class="main-content-inner mt-5">
        <div class="col-lg-12">
        {{-- judul --}}
        <h2 style="text-align: center; font-weight: lighter">Laporan Penjualan</h2>
        <h5 style="text-align: center; font-weight: lighter">{{$Date}}</h5>
        <div class="row">
            <table class="table table-bordered table-striped" style="width:80%; margin-left: 10%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Meja</th>
                        <th>Makanan</th>
                        <th>Minuman</th>
                        <th>Total Harga</th>
                        <th>No Pesanan</th>
                        <th>dibuat oleh</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                    @php
                        $no=1;
                    @endphp
                <tbody>
                    @foreach ($pesan as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->no_meja}}</td>
                            <td>{{$pesanan->food->name}}</td>
                            <td>{{$pesanan->drink->name}}</td>
                            <td>Rp.{{number_format($pesanan->total_price)}}</td>
                            <td>{{$pesanan->no_pesanan}}</td>
                            <td>{{$pesanan->user->name}}</td>
                            <td>{{$pesanan->user->jabatan}}</td>
                            <td>{{$pesanan->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <h6 style="margin-left: 10% ;font-weight: lighter">Nama : {{$user->name}}</h6>
                <h6 style="margin-left: 10% ;font-weight: lighter">Email : {{$user->email}}</h6>
                <h6 style="margin-left: 10% ;font-weight: lighter">Jabatan : {{$user->jabatan}}</h6>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>