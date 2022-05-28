<?php

namespace App\Http\Controllers\agency;

use App\Cars; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role'); 
    }

    public function list_cars()
    {
        $cars = Cars::get();
        return view('agency.cars',compact('cars'));
    }

    public function add_cars()
    {
        return view('agency.cars-add');
    }

    public function show_car(Request $request)
    {
        $var = Cars::where('id',$request->id)->first();
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Server fetch successfully','ResponseData' => $var], 200);
    }

    public function list_car()
    {
        $cars = Cars::get();
        return view('agency_tables.cars',compact('cars'));
    }

    public function store_car(Request $request) 
    {
        
        $validation = Validator::make($request->all(),[
            'vehicle_model'    => ['required', 'unique:Cars'],
            'vehicle_number'   => ['required', 'unique:Cars'],
            'seating_capacity' => ['required', 'numeric'],
            'rent'             => ['required', 'numeric'],
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
              $Cars = new Cars;
              $Cars->seating_capacity = $request->seating_capacity;
              $Cars->vehicle_number   = $request->vehicle_number;
              $Cars->vehicle_model    = $request->vehicle_model;
              $Cars->rent             = $request->rent;
              $Cars->save();           

              $success_output = 'Car Added Successfully!';
          }
          $output = array(
              'error'     =>  $error_array,
              'success'   =>  $success_output
          );
          echo json_encode($output);

    }



    public function edit_car(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'vehicle_model'    => ['required'],
            'vehicle_number'   => ['required'],
            'seating_capacity' => ['required', 'numeric'],
            'rent'             => ['required', 'numeric'],
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
              $Cars = new Cars;
              $Cars->exists = true;
              $Cars->id = $request->id;
              $Cars->seating_capacity = $request->seating_capacity;
              $Cars->vehicle_number   = $request->vehicle_number;
              $Cars->vehicle_model    = $request->vehicle_model;
              $Cars->rent             = $request->rent;
              $Cars->save();           

              $success_output = 'Car Details Updated Successfully!';
          }
          $output = array(
              'error'     =>  $error_array,
              'success'   =>  $success_output
          );
          echo json_encode($output);
    }

    public function destroy_car(Request $request)
    {
        $var = Cars::where('id',$request->id)->delete();
        if($var){return 1;} else {return 0;}
    }
        

}
