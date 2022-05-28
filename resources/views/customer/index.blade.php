@extends('theme.default')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                <a href="#" aria-expanded="false">
                    <div class="card-body">
                        <h3 class="card-title text-white">Cars Available To Book</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($cars)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-car"></i></span>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                <a href="{{URL::to('/customer/mybooking')}}" aria-expanded="false">
                    <div class="card-body">
                        <h3 class="card-title text-white">My Booking</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($cars_bookings)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar-o"></i></span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <span id="message"></span>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cars Available To Book</h4>
                        <div class="table-responsive" id="table-display">
                            @include('customer_tables.cars')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection