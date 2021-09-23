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
                        <div class="d-flex justify-content-end">
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
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left mt-3">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Judul --}}

            {{-- CONTENT --}}
            <div class="main-content-inner">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i> Foods</div>
                                    <h2>{{$food}}</h2>
                                </div>
                                <canvas id="seolinechart1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> Drinks</div>
                                    <h2>{{$drink}}</h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i> Pesanan</div>
                                    <h2>{{$pesanan}}</h2>
                                </div>
                                <canvas id="seolinechart1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            {{-- End Content --}}
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
@endsection