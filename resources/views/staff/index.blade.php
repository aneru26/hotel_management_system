@extends('layout')
@section('content') 
     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Staffs
            <a href="{{url('admin/staff/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
        <a href="#" class></a>
        </h6>
    </div>
    <div class="card-body">
    @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Full Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->full_name}}</td>
                        <td><img width="80" src="{{ Storage::url($d->photo) }}"></td>
                        <td>
                            <a href="{{url('admin/staff/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{url('admin/staff/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{url('admin/staff/payments/'.$d->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-credit-card"></i></a>
                            <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/staff/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
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