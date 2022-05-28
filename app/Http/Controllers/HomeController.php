<?php

namespace App\Http\Controllers;

use App\Cars; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Cars::get();
        return view('welcome',compact('cars'));
    }
}
