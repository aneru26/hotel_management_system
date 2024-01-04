@extends('frontlayout')
@section('content')
    

<body class="">
<div class="container bg-warning pt-5">

        <div class="text-center pt-5">
                                <h1 class="h4 text-gray-900 mb-4">ROOM BOOKING</h1>
                                @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
                            </div>
        <div class="table-responsive">
            <form method="post" enctype="multipart/form-data" action="{{ url('admin/booking')}}">
                @csrf
                    <table class="table table-bordered">
                        
                        <tr>
                            <th>CheckIn Date <span class="text-danger">*</span></th>
                            <td><input name="checkin_date" type="date" class="form-control checkin-date"></td>
                        </tr>
                        <tr>
                            <th>CheckOut Date <span class="text-danger">*</span></th>
                            <td><input name="checkout_date" type="date" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Available Rooms <span class="text-danger">*</span></th>
                            <td>
                            <select class="form-control room-list" name="room_id">
                                    
                                </select>
                                <p>Price: <span class="show-room-price"></span></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Adults <span class="text-danger">*</span></th>
                            <td><input name="total_adults" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td><input name="total_children" type="text" class="form-control"></td>
                        </tr>
                      
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}">
                                <input type="hidden" name="roomprice" class="room-price" value="">
                                <input type="hidden" name="ref" value="front">
                                <input type="submit" class="btn btn-primary" >
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
    </div>
</body>

   


@section('scripts')



<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            // Disable nice-select for the select element
            $('.room-list').niceSelect('destroy');
            // AJAX request
            $.ajax({
                url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                   var _html='';
                   $.each(res.data,function(index,row){
                    _html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                   });

                   $(".room-list").html(_html);
                   // Reinitialize nice-select after updating the options
                   $('.room-list').niceSelect();

                   var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                    $(".room-price").val(_selectedPrice);
                    $(".show-room-price").text(_selectedPrice);
                }
            });
        });

        $(document).on("change",".room-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".room-price").val(_selectedPrice);
            $(".show-room-price").text(_selectedPrice);
        });
    });
</script>

@endsection
@endsection