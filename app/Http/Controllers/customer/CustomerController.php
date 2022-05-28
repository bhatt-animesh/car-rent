<?php

namespace App\Http\Controllers\customer;

use App\Cars; 
use App\CarBooking; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cars = Cars::get();
        $cars_bookings = CarBooking::where('user_id','=',auth()->user()->id)->get();
        return view('customer.index',compact('cars','cars_bookings'));
    }
}
