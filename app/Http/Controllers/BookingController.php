<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.index',['data'=>$bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customer::all();
        return view('booking.create',['data'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',
            'roomprice'=>'required',
           
        ]);

            if($request->ref=='front'){
                $sessionData=[
                    'customer_id'=>$request->customer_id,
                    'room_id'=>$request->room_id,
                    'checkin_date'=>$request->checkin_date,
                    'checkout_date'=>$request->checkout_date,
                    'total_adults'=>$request->total_adults,
                    'total_children'=>$request->total_children,
                    'roomprice'=>$request->roomprice,
                    'ref'=>$request->ref
                ];
                session($sessionData);
                \Stripe\Stripe::setApiKey('sk_test_51NtOhBEPDfa6ipucE4PnBaJ3fckVVEXFRmCPLJ3Pw5gutMj8BmmAkLtenxmB1cNZt21pXbSPtDYfF4RnWJgbd03I008XDAHmiG');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'price_data' => [
                    'currency' => 'php',
                    'product_data' => [
                      'name' => 'Rooms',
                    ],
                    'unit_amount' => $request->roomprice*100,
                  ],
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://127.0.0.1:8000/booking/fail',

            ]);
            return redirect($session->url);

        }else{
            $data=new Booking;
            $data->customer_id=$request->customer_id;
            $data->room_id=$request->room_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;
            if($request->ref=='front'){
                $data->ref='front';
            }else{
                $data->ref='admin';
            }
            $data->save();
            return redirect('admin/booking/create')->with('success','Data has been added.');
        }
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','Data has been deleted.');
    }

    //Check Available Rooms
    function available_rooms(Request $request, $checkin_date) {
        $arooms = DB::select("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
    
        $data = [];
        foreach ($arooms as $room) {
            $roomType = RoomType::find($room->room_type_id); // Change 'roomTypes' to 'roomType'
            $data[] = ['room' => $room, 'roomtype' => $roomType]; // Change 'roomTypes' to 'roomType'
        }
    
        return response()->json(['data' => $data]);
    }
    

    public function front_booking()
    {
        $customers=Customer::all();
        return view('front-booking');
    }

    function booking_payment_success(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51NtOhBEPDfa6ipucE4PnBaJ3fckVVEXFRmCPLJ3Pw5gutMj8BmmAkLtenxmB1cNZt21pXbSPtDYfF4RnWJgbd03I008XDAHmiG');        
        $session_id = $request->get('session_id');
    
        try {
            $session = \Stripe\Checkout\Session::retrieve($session_id);
    
            // Check if the session was successful and paid
            if ($session && $session->payment_status === 'paid') {
                $data = new Booking;
                $data->customer_id = session('customer_id');
                $data->room_id = session('room_id');
                $data->checkin_date = session('checkin_date');
                $data->checkout_date = session('checkout_date');
                $data->total_adults = session('total_adults');
                $data->total_children = session('total_children');
                $data->ref = session('ref') == 'front' ? 'front' : 'admin';
                $data->save();
                
                return view('booking.success');
            } else {
                // Handle the case where payment status is not 'paid'
                return view('booking.failure', ['error' => 'Payment was not successful.']);
            }
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle any Stripe API errors
            return view('booking.failure', ['error' => 'Stripe API error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Handle other exceptions
            return view('booking.failure', ['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    

        function booking_payment_fail(Request $request){
            return view('booking.failure');
            
        }
    
        

      
            public function displayBookingList()
            {
                $data['getRecord']= Booking::customergetRecord();
                
                return view('booking-list', $data);
            }


}