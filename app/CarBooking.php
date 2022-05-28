<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    protected $table='car_bookings';
    protected $fillable=['id','user_id','car_id','number_of_day','date_of_booking'];

    public function user_details(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function car_details(){
        return $this->hasOne('App\Cars','id','car_id');
    }
}
