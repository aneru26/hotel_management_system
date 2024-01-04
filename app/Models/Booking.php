<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table ="bookings";

    static public function customergetRecord()
    {
        
        $return = Booking::select(
                'bookings.*',
                'customer_id as name',
                'rooms.title as room_name',
                
            )
            ->join('customers', 'customers.id', '=', 'bookings.customer_id')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->orderBy('bookings.id', 'desc')
            ->get();
    
        return $return;
    }

    function customer(){
        return $this->belongsTo(Customer::class);
    }

    function room(){
        return $this->belongsTo(Room::class);
    }
}
