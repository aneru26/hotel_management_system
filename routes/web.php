<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'home' ]);



// Admin Login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login' ]);
Route::get('admin/logout',[AdminController::class,'logout' ]);


//Admin Dashboard
Route::get('admin',[AdminController::class,'dashboard' ]);


//RoomType Routes
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy' ]);
Route::resource('admin/roomtype',RoomtypeController::class );

//Room Routes
Route::get('admin/rooms{id}/delete',[RoomController::class,'destroy' ]);
Route::resource('admin/rooms',RoomController::class );

//Customer Routes
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy' ]);
Route::resource('admin/customer',CustomerController::class );

//Delete Images
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image' ]);

//Department Routes
Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy' ]);
Route::resource('admin/department',StaffDepartment::class );

//Staff Payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payment' ]);
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment' ]);
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment' ]);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment' ]);

//Staff Crud
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy' ]);
Route::resource('admin/staff',StaffController::class );

//Booking
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy' ]);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms' ]);
Route::resource('admin/booking',BookingController::class );

//Customer Login
Route::get('frontlogin', [CustomerController::class, 'frontlogin']);
Route::post('customer/login', [CustomerController::class, 'customer_login']);
Route::get('register', [CustomerController::class, 'register']);
Route::get('logout', [CustomerController::class, 'logout']);    

//Customer Booking
Route::get('bookinglist', [BookingController::class, 'displayBookingList']);
Route::get('booking', [BookingController::class, 'front_booking']);
Route::get('booking/success', [BookingController::class, 'booking_payment_success']);
Route::get('booking/fail', [BookingController::class, 'booking_payment_fail']);

//Service Crud
Route::get('admin/service/{id}/delete',[ServiceController::class,'destroy' ]);
Route::resource('admin/service',ServiceController::class );

