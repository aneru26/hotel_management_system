@extends('frontlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="border border-3 border-warning"></div>
                <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="75" height="75" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm3.854-9.146a.5.5 0 0 0-.708-.708L8 7.293l-3.146-3.147a.5.5 0 0 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z" />
    </svg>
</div>
                    <div class="text-center">
                        <h1 class="text-danger">Opps!</h1>
                        <h1>Booking Failed</h1>
                        <a href="{{url('/')}}"><button class="btn btn-outline-warning">Back Home</button> </a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
@endsection