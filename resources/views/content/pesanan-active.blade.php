@extends('partials.sidebar')
@section('content')
    <body>
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row">
                    <div class="col-md-12 col-sm-12 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="d-flex justify-content-end mr-3">
                            <a href="/profile"><button class="btn mr-3"><i class="fas fa-user-circle fa-2x" style="width: 30px; height: 25px; color: #0953f3; margin-top: -5px"></i></button></a>
                            <a href="/logout"><button class="btn btn-danger">Logout</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- header area end -->

            {{--  Judul Content  --}}
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area">
                            <h4 class="page-title pull-left mt-3">Sells</h4>
                        </div>
                        <div class="d-flex justify-content-end mt-3 mb-3 mr-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Add New Sells
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CONTENT --}}
            <div class="main-content-inner">
                <div class="col-lg-12">
                <div class="row">
                    <table id="example" class="table" style="width:100%">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <thead class="">
                            <tr class="bg-primary" style="color: #fff">
                                <th>No</th>
                                <th>No Meja</th>
                                <th>Makanan</th>
                                <th>Minuman</th>
                                <th>Total Harga</th>
                                <th>No Pesanan</th>
                                <th>dibuat oleh</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                            @php
                                $no=1;
                            @endphp
                        <tbody>
                            @foreach ($pesanan_active as $pesan)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$pesan->no_meja}}</td>
                                    <td>{{$pesan->food->name}}</td>
                                    <td>{{$pesan->drink->name}}</td>
                                    <td>Rp.{{number_format($pesan->total_price)}}</td>
                                    <td>{{$pesan->no_pesanan}}</td>
                                    <td>{{$pesan->user->name}}</td>
                                    <td>{{$pesan->user->jabatan}}</td>
                                    <td>{{$pesan->status}}</td>
                                    <td style="text-align: center">
                                        <a data-toggle="modal" data-target="#editModal-{{$pesan->id}}" class="btn btn-warning"><i class="fas fa-edit" style="color: #fff;"></i></a>
                                        <a class="btn btn-danger ml-3" href="/delete-pesanan/active/{{ $pesan->id }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            {{-- End Content --}}
        </div>

    {{-- add modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sells</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <form action="/create-sell/active" method="POST" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- NO MEJA --}}
                        <select class="form-control mt-3" name="no_meja" id="">
                                <option value="" selected>Pilih nomor meja</option>
                            @for ($i = 1; $i <= 15; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                        {{-- makanan --}}
                        <select class="form-control mt-3" name="makanan_id" id="">
                                <option value="" selected>Pilih Makanan</option>
                            @foreach ($food as $foods)
                                <option value="{{$foods->id}}">{{$foods->name}}</option>
                            @endforeach
                        </select>

                        {{-- minuman --}}
                        <select class="form-control mt-3" name="minuman_id" id="">
                                <option value="" selected>Pilih Minuman</option>
                            @foreach ($drink as $drinks)
                                <option value="{{$drinks->id}}">{{$drinks->name}}</option>
                            @endforeach
                        </select>

                        {{-- no pesanan --}}
                        <input type="text" class="form-control mt-3" name="no_pesanan" autocomplete="off" placeholder="No. Pesanan">
                        {{-- total price --}}
                        <input type="text" name="total_price" hidden>

                        {{-- status --}}
                        @if (Auth::user()->jabatan == 'pelayan')
                        <select class="form-control mt-3" name="status" id="">
                            <option value="active" selected>active</option>
                        </select>
                        @else
                        <select class="form-control mt-3" name="status" id="">
                            <option value="active">active</option>
                            <option value="not_active">not_active</option>
                        </select>
                        @endif

                        <div class="btnmdl1">
                            <button type="submit" value="Upload" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    {{-- end add modal --}}
    {{-- edit modal --}}
        @foreach ($pesanan_active as $edt)
        {{-- Update Modal --}}
        <div class="modal fade" id="editModal-{{$edt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sells</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="text-align: center">
                <form action="{{"/pesanan/active/edit{$edt->id}"}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    {{-- no meja --}}
                    <select class="form-control mt-3" name="no_meja" id="">
                        <option value="{{$edt->no_meja}}" selected>{{$edt->no_meja}}</option>
                        @for ($i = 1; $i <= 15; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    {{-- makanan --}}
                    <select class="form-control mt-3" name="makanan_id" id="">
                        <option value="{{$edt->makanan_id}}" selected>{{$edt->food->name}}</option>
                        @foreach ($food as $foods)
                            <option value="{{$foods->id}}">{{$foods->name}}</option>
                        @endforeach
                    </select>

                    {{-- minuman --}}
                    <select class="form-control mt-3" name="minuman_id" id="">
                        <option value="{{$edt->minuman_id}}" selected>{{$edt->drink->name}}</option>
                        @foreach ($drink as $drinks)
                            <option value="{{$drinks->id}}">{{$drinks->name}}</option>
                        @endforeach
                    </select>

                    {{-- no pesanan --}}
                    <input type="text" class="form-control mt-3" name="no_pesanan" autocomplete="off" value="{{$edt->no_pesanan}}" disabled>
                    {{-- total price --}}
                    <input type="text" name="total_price" hidden>

                    {{-- status --}}
                    @if (Auth::user()->jabatan == 'pelayan')
                    <input type="text" class="form-control mt-3" placeholder="{{$edt->status}}" disabled>
                    @endif
                    @if (Auth::user()->jabatan =='kasir')
                    <select class="form-control mt-3" name="status" id="">
                        <option value="{{$edt->status}}">{{$edt->status}}</option>
                        <option value="active">active</option>
                        <option value="not_active">not_active</option>
                    </select>
                    @endif

                    <div class="modal-footer">
                        <button  type="submit" value="Simpan Data" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    {{-- end edit modal --}}
    </body>
@endsection