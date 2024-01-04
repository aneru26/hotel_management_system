@extends('layout')
@section('content') 
     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Staff

        <a href="{{url('admin/staff/')}}" class="float-right btn btn-success btn-sm">View all</a>
        </h6>

    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <form enctype="multipart/form-data" method="post" action="{{ url('admin/staff/'.$data->id)}}">
                @csrf
                @method('put')
                    <table class="table table-bordered">
                    <tr>
                            <th>Full Name</th>
                            <td><input value="{{$data->full_name}}" name="full_name" type="text" class="form-control"></td>
                        </tr>

                       


                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file" >
                            <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                @if ($data->photo)
                                    <img width="80" src="{{ Storage::url($data->photo) }}">
                                @else
                                    <!-- Display a placeholder image or a message if no image exists -->
                                    No image available
                                @endif  
                                </td> 
                        </tr>

                        
                       
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input @if($data->salary_type=='daily') checked @endif type="radio" name="salary_type" value="daily">Daily
                                <input @if($data->salary_type=='weekly') checked @endif type="radio" name="salary_type" value="weekly">Weekly
                                <input @if($data->salary_type=='monthly') checked @endif type="radio" name="salary_type" value="monthly">Monthly
                            </td>
                        </tr>

                        <tr>
                            <th>Salary Amount</th>
                            <td><input value="{{$data->salary_amt}}" name="salary_amt" class="form-control" type="number" ></td>
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