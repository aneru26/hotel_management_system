<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class Customer extends Model implements Authenticatable
{
    use HasFactory, Notifiable, AuthenticatableTrait;

    protected $table = "customers";
    
    protected $fillable = [
        'name',
        'email',
        'password',
        // Add other columns as needed
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
