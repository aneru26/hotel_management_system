@extends('frontlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nel Luxury Hotel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url('img/logo.png');"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Account!</h1>
                            </div>
                            
                            <form method="post" action="{{url('customer/login')}} " enctype="multipart/form-data" class="user">
                            @csrf
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" required
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" required placeholder="Password">
                                    </div>
                                    
                                </div>
                             
                                
                                
                                
                                <input type="hidden" name="ref" value="front">
                                
                                <input type="submit" class="btn btn-warning btn-user btn-block ">
                                    
                                <hr>
                                
                            </form>
                           
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/')}}">Go To Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset ('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
@endsection
@section('scripts')
@endsection