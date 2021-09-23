
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    {{--  datatables  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
  
</head>
<body>
<div class="page-container">
    {{--  SIDEBAR  --}}
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    {{-- <a href="#"><img src="{{asset('images/sidebar-logo.png')}}" alt="logo"></a> --}}
                    <span style="color: rgb(223, 219, 219); font-weight: lighter">Sistem Pemesanan Makanan</span>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="/dashboard" aria-expanded="true" style="text-decoration: none"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="/foods" aria-expanded="true" style="text-decoration: none"><i class="fas fa-utensils"></i><span>foods</span></a>
                            </li>
                            <li>
                                <a href="/drinks" aria-expanded="true" style="text-decoration: none"><i class="fas fa-coffee"></i></i><span>drinks</span></a>
                            </li>
                            <li>
                                <a href="/pesanan/active" aria-expanded="true" style="text-decoration: none"><i class="fas fa-shopping-cart"></i><span>Pesanan (active)</span></a>
                            </li>
                            @if (Auth::user()->jabatan == 'pelayan')
                                <li>
                                    <a href="#" aria-expanded="true" style="text-decoration: none" hidden><i class="fas fa-shopping-cart"></i><span>Pesanan (all)</span></a>
                                </li>
                            @else
                                <li>
                                    <a href="/pesanan-all" aria-expanded="true" style="text-decoration: none" ><i class="fas fa-shopping-cart"></i><span>Pesanan (all)</span></a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    {{--  END SIDEBAR  --}}
        
    @yield('content')
    <footer>
        <div class="footer-area">
            
        </div>
    </footer>
    <div>
        
        {{--  disable/enable pageination  --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "paging": true,
                    "pageLength": 5,
                    "sPagingType": "simple_numbers",
                    "lengthMenu":[[5, 10, 20, -1], [5, 10, 20, "All"]],
                    {{-- "order": [[ 1, "desc" ]]  --}}
                });
            } );
        </script>
        <!-- bootstrap 4 js -->
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script> 
        <!-- all pie chart -->
        <script src="{{asset('js/pie-chart.js')}}"></script> 
        <!-- others plugins -->
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
    </div>
</div>
</body>