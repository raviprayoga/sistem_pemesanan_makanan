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
                            <h4 class="page-title pull-left mt-3">Foods</h4>
                        </div>
                        <div class="d-flex justify-content-end mt-3 mb-3 mr-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Add New Foods
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Judul --}}

            {{-- CONTENT --}}
            <div class="main-content-inner">
                <div class="col-lg-12">
                <div class="row">
                    <table id="example" class="table" style="width:100%">
                        <thead class="">
                            <tr class="bg-primary" style="color: #fff">
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                            @php
                                $no=1;
                            @endphp
                        <tbody>
                            @foreach ($food as $foods)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$foods->name}}</td>
                                    <td>Rp.{{number_format($foods->price)}}</td>
                                    <td>{{$foods->status}}</td>
                                    <td style="text-align: center">
                                        <a data-toggle="modal" data-target="#editModal-{{$foods->id}}" class="btn btn-warning"><i class="fas fa-edit" style="color: #fff;"></i></a>
                                        <a class="btn btn-danger ml-3" href="/delete-foods/{{ $foods->id }}"><i class="fas fa-trash-alt"></i></a>
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

        {{-- edit modal --}}
        @foreach ($food as $edt)
            {{-- Update Modal --}}
            <div class="modal fade" id="editModal-{{$edt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Foods</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                    <form action="{{"/foods/edit{$edt->id}"}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value=" ">
                        <input class="form-control" name="name" type="text" id="name" value="{{$edt->name}}"> 
                        <input class="form-control mt-3" name="price" type="number" id="price" value="{{$edt->price}}"> 
                        <select class="form-control mt-3" name="status" id="">
                            <option value="{{$edt->status}}">{{$edt->status}}</option>
                            <option value="ready">ready</option>
                            <option value="not_ready">not_ready</option>
                        </select>
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

        {{-- add modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Foods</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <form action="/create-food" method="POST" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        <input class="form-control" name="name" type="text" placeholder="name"> <br>
                        <input class="form-control" name="price" type="number" id="price" placeholder="price"> 
                        <select class="form-control mt-3" name="status" id="">
                            <option value="ready">ready</option>
                            <option value="not_ready">not_ready</option>
                        </select>
                        <div class="btnmdl1">
                            <button type="submit" value="Upload" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    {{-- end add modal --}}
    </body>
@endsection