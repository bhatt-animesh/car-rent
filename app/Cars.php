<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table='cars';
    protected $fillable=['id','vehicle_model','vehicle_number','rent','seating_capacity'];
}
