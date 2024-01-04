@extends('layout')
@section('content') 
     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Roomtypes

        <a href="{{url('admin/roomtype/')}}" class="float-right btn btn-success btn-sm">View all</a>
        </h6>

    </div>
    <div class="card-body">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form enctype="multipart/form-data" method="post" action="{{ url('admin/roomtype')}}">
                @csrf
                    <table class="table table-bordered">
                       

<tr>
    <th>Title</th>
    <td>
        <select name="title" class="form-control">
            <option value="">Select Room Type</option>
            <option value="Single">Single Room</option>
            <option value="Double">Double Room</option>
            <option value="Suite">Suite</option>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Standard Room">Standard Room</option>
            <option value="Executive Suite">Executive Suite</option>
            <option value="Penthouse">Penthouse</option>
            <option value="Connecting Room">Connecting Room</option>
            <option value="Ocean View Room">Ocean View Room</option>
            <option value="Family Room">Family Room</option>
            
        </select>
    </td>
</tr>
                        <tr>
                            <th>Price</th>
                            <td><input name="price" type="number" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Gallery</th>
                            <td><input type="file" multiple name="imgs[]" ></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@section('scripts')
 <!-- Custom styles for this page -->
 <link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('js/demo/datatables-demo.js') }}"></script>
@endsection

@endsection