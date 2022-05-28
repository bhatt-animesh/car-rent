<?php

namespace App\Http\Controllers\agency;

use App\Cars; 
use App\CarBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarsBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role'); 
    }

    public function list_car_booking()
    {
        $cars_bookings = CarBooking::get();
        return view('agency.cars-booking',compact('cars_bookings'));
    }
}
