<?php

namespace App\Http\Controllers\customer;

use App\Cars; 
use App\CarBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CarsBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $cars = Cars::where('id','=',$id)->first();
        return view('customer.carbooking',compact('cars'));
    }

    public function store_car_booking(Request $request) 
    {
        
        $validation = Validator::make($request->all(),[
            'days'    => ['required'],
            'date'   => ['required'],
          ]);

          $error_array = array();
          $success_output = '';

          if ($validation->fails())
          {
              foreach($validation->messages()->getMessages() as $field_name => $messages)
              {
                  $error_array[] = $messages;
              }

          }
          else
          {
              $CarBooking = new CarBooking;
              $CarBooking->user_id          = auth()->user()->id;
              $CarBooking->car_id           = $request->car_id;
              $CarBooking->number_of_day    = $request->days;
              $CarBooking->date_of_booking  = $request->date;
              $CarBooking->save();        

              $success_output = 'Car Booking Successfully!';
          }
          $output = array(
              'error'     =>  $error_array,
              'success'   =>  $success_output
          );
          echo json_encode($output);

    }

    public function my_booking()
    {
        $mybookings = CarBooking::where('user_id','=',auth()->user()->id)->get();
        return view('customer.mybooking',compact('mybookings'));
    }

}
