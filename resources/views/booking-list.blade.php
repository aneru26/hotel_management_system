@extends('frontlayout')
@section('content')

<body class="">
    <div class="container bg-warning pt-5">

        <h1 class="pt-5">Booking List</h1>

     
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room ID</th>
                        <th>Checkin Date</th>
                        <th>Checkout Date</th>
                        <th>Total Adults</th>
                        <th>Total Children</th>
                       
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->room_name }}</td>
                            <td>{{ $booking->checkin_date }}</td>
                            <td>{{ $booking->checkout_date }}</td>
                            <td>{{ $booking->total_adults }}</td>
                            <td>{{ $booking->total_children }}</td>
                         
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
     

    </div>
</body>

@endsection