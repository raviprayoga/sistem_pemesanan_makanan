@extends('partials.sidebar')
@section('content')
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
    
    <div class="d-flex justify-content-center mt-3">
        <div class="card" style="width: 50rem; height: 45rem; background-color: #0077b6; border-radius: 6px">
            <div class="card-body">
              <i class="fas fa-user-circle fa-10x d-flex justify-content-center mt-5" style="color: #e8e8e4"></i>
              <h5 class="card-title mt-5" style="text-align: center; color:#fff">Youre Profile</h5>
              <div style="">
                <p class="card-text mt-5" style="text-align: center;color:#fff" >Name : {{$userName}}</p>
                <p class="card-text" style="text-align: center; color:#fff" >Email : {{$userEmail}}</p>
                <p class="card-text" style="text-align: center; color:#fff" >Jabatan : {{$userRole}}</p>
              </div>
              <div class="d-flex justify-content-center mt-5">
                  <a href="/laporan/{{Auth::user()->id}}" target="_blank"><button class="btn btn-dark" style="color: #fff; border-radius: 8px">Cetak laporan penjualan</button></a>
              </div>
            </div>
        </div>
    </div>
@endsection