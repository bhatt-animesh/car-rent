<?php

namespace App\Http\Controllers\agency;

use App\Cars; 
use App\CarBooking; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role'); 
    }

    public function index()
    {
        $cars = Cars::get();
        $cars_bookings = CarBooking::get();
        return view('agency.index',compact('cars','cars_bookings'));
    }



}
