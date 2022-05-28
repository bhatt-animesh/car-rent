@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/customer/home')}}">Customer</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Book Car</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Car Details</h4><hr>
                    <div class="form-group row">
                        <label for="vehicle_model" class="col-sm-4 col-form-label"><b><i class="fa fa-car" aria-hidden="true"></i> Vehicle Model:</b> {{$cars->vehicle_model}}</label>
                    </div>
                    <div class="form-group row">
                        <label for="vehicle_number" class="col-sm-4 col-form-label"><b><i class="fa fa-cog" aria-hidden="true"></i> Vehicle Number:</b> {{$cars->vehicle_number}}</label>
                    </div>
                    <div class="form-group row">
                        <label for="rent" class="col-sm-4 col-form-label"><b><i class="fa fa-book" aria-hidden="true"></i>  Rent Per Day:</b> {{$cars->rent}} Rs</label>
                    </div>
                    <div class="form-group row">
                        <label for="seating_capacity" class="col-sm-4 col-form-label"><b><i class="fa fa-users" aria-hidden="true"></i>  Seating Capacity:</b> {{$cars->seating_capacity}}</label>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <span id="msg"></span>
                    <h4 class="card-title">Booking Details</h4><hr>
                    <form id="booking_data" enctype="multipart/form-data">
                        @csrf
                        @if(Auth::user()->role_id == 2)
                            <input type="hidden" class="form-control" id="car_id" name="car_id" value="{{$cars->id}}">
                            <div class="form-group row">
                                <label for="days" class="col-sm-2 col-form-label">Number Of Days:</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="days" name="days" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="date_of_booking" class="col-sm-2 col-form-label">Start Date:</label>
                                <div class="col-sm-5">
                                    <input id="date_picker" type="date" class="form-control" id="date" name="date" autocomplete="off" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Rent Car</button>
                        @else
                            <h3><b>Only Login Coustmer Can Book Car</b></h3>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #/ container -->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
     
     $('#booking_data').on('submit', function(event){
         event.preventDefault();
         swal({
              title: "Please Wait",
              imageUrl: "{!! asset('images/loader.gif') !!}",
              showConfirmButton: false,
              allowOutsideClick: false
        });
         var form_data = new FormData(this);
         $.ajax({
             url:"{{ URL::to('customer/car/booking/store') }}",
             method:"POST",
             data:form_data,
             cache: false,
             contentType: false,
             processData: false,
             dataType: "json",
             success: function(result) {
                 if (result.success.includes("Successfully!")){
                    swal({
                        title: "Success",
                        text: "Car Booked Successfully!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            swal.close();
                            window.location.replace("{{URL::to('/customer/mybooking/')}}");
                        }
                    });
                }else{
                    var msg = '';
                    if(result.error.length > 0){for(var count = 0; count < result.error.length; count++){var number = count + 1; msg += number + ') ' + result.error[count] + '\n';}}

                    swal({
                        title: "Error",
                        text: msg,
                        type: "error",
                        showCancelButton: false,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            swal.close();
                        }
                    });
                }
             },
         })
     });
});
</script>
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>

@endsection