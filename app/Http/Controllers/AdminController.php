<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class AdminController extends Controller
{
    //Login
    function login(){
        return view('login');
    }

    //check login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }

            return redirect("admin");
        }else {
            return redirect ('admin/login')->with('msg','Invalid Username/Password!!');
        }
    }

        //logout
        function logout(){
            session()->forget(['adminData']);
            return redirect ('admin/login');
        }

        //dashboard
        function dashboard(){
            $bookings = Booking::selectRaw('DATE(checkin_date) as checkin_date, count(id) as total_bookings')
                ->groupBy('checkin_date')
                ->get();
        
            $labels = [];
            $data = [];
        
            foreach ($bookings as $booking) {
                $labels[] = $booking->checkin_date; // No need to format here
                $data[] = $booking->total_bookings;
            }
            
            //For Pie Chart
            $rtbookings = DB::table('room_types as rt')
    ->join('rooms as r', 'r.room_type_id', '=', 'rt.id')
    ->join('bookings as b', 'b.room_id', '=', 'r.id')
    ->select('rt.id',  /* Include actual column names from room_types table */ 
             'r.room_type_id',  /* Include actual column names from rooms table */ 
             'b.room_id', /* Include actual column names from bookings table */
             DB::raw('count(b.id) as total_bookings'))
    ->groupBy('rt.id', /* Include actual column names from room_types table */
             'r.room_type_id', /* Include actual column names from rooms table */
             'b.room_id') // Include actual column names from bookings table
    ->get();

    $plabels = [];
    $pdata = [];
    
    foreach ($rtbookings as $rbooking) {
        $plabels[] = $booking->detail; // This line is causing the error
        $pdata[] = $booking->total_bookings;
    }
                    
        
            //End

            // echo 'prev';
            // print_r( $rtbookings);

            return view('dashboard', ['labels' => json_encode($labels), 'data' => json_encode($data),'plabels' => json_encode($plabels), 'pdata' => json_encode($pdata)]);
        }
        
}
