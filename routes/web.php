<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');


//all Auth Routes
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('/agency/register', 'RegisterController@agency_register')->name('agency_register');
    Route::get('/customer/register', 'RegisterController@customer_register')->name('customer_register');
    Route::post('/register', 'RegisterController@create_user');
});


//all Car Rental Agency Routes
Route::group(['prefix' => 'agency', 'namespace' => 'agency'], function () {
    Route::group(['middleware' => ['auth','role']],function(){
        Route::get('home', 'AgencyController@index')->name('agencyhome');

        Route::get('cars', 'CarsController@list_cars');
        Route::get('cars/add', 'CarsController@add_cars');
        Route::post('cars/store', 'CarsController@store_car');
        Route::post('cars/show', 'CarsController@show_car');
        Route::post('cars/edit', 'CarsController@edit_car');
        Route::get('cars/list', 'CarsController@list_car');
        Route::post('cars/destroy', 'CarsController@destroy_car');

        Route::get('cars/booking', 'CarsBookingController@list_car_booking');
        
    });
});


//all Customers Routes
Route::group(['prefix' => 'customer', 'namespace' => 'customer'], function () {
    Route::group(['middleware' => ['auth']],function(){
        Route::get('home', 'CustomerController@index')->name('customerhome');

        Route::get('car/booking/{id}', 'CarsBookingController@index');
        Route::post('car/booking/store', 'CarsBookingController@store_car_booking');

        Route::get('mybooking', 'CarsBookingController@my_booking');
        
    });
});



