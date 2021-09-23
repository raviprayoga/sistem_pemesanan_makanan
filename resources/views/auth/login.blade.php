<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <style>
        .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #68a77696;
        }
    </style>
</head>
<body style="background-image: linear-gradient(to right,#6bbf59,#08a045);">
    <div class="container-fluid d-flex justify-content-center mt-5">
        <form action="/loginPost" method="POST" enctype="multipart/form-data" class="col-md-4 mt-5">
            {{ csrf_field() }}
            <div class="card col-md-12 mt-5" style="">
                    <div class="card-body">
                        <h5 class="card-title mb-4 auth-judul" style="text-align: center" >Login <hr style="height: 2px; background-image: linear-gradient(to right,#6bbf59,#08a045);"></h5>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control auth-input" id="email" placeholder="email" autocomplete="off">
                        </div>
                        <div class="mb-3">  
                            <input type="password" name="password" id="password" class="form-control auth-input" placeholder="password" rows="3" autocomplete="off">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary" style="width: 100%" type="submit">Login</button>
                        </div>
                    </div>
            </div>
        </form> 
    </div>
</body>
</html>