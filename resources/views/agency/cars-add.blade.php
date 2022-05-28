
@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/agency/home')}}">Agency</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Car</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span id="msg"></span>
                    <h4 class="card-title">Add New Car</h4><hr>
                    <p class="text-muted"><code></code>
                    </p>
                    <form id="cars_data" enctype="multipart/form-data">
                
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group row">
                            <label for="vehicle_model" class="col-sm-2 col-form-label">Vehicle Model:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="Audi-A3" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vehicle_number" class="col-sm-2 col-form-label">Vehicle Number:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="vehicle_number" name="vehicle_number"  placeholder="AP 21 BP 7331" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rent" class="col-sm-2 col-form-label">Rent Per Day:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="rent" name="rent"  placeholder="15000" autocomplete="off" required>
                            </div>
                        </div>                      
                        <div class="form-group row">
                            <label for="seating_capacity" class="col-sm-2 col-form-label">Seating Capacity:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="seating_capacity" name="seating_capacity"  placeholder="10" autocomplete="off" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
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
     
     $('#cars_data').on('submit', function(event){
         event.preventDefault();
         swal({
              title: "Please Wait",
              imageUrl: "{!! asset('images/loader.gif') !!}",
              showConfirmButton: false,
              allowOutsideClick: false
        });
         var form_data = new FormData(this);
         $.ajax({
             url:"{{ URL::to('agency/cars/store') }}",
             method:"POST",
             data:form_data,
             cache: false,
             contentType: false,
             processData: false,
             dataType: "json",
             success: function(result) {
                 if (result.success.includes("Added")){
                    swal({
                        title: "Success",
                        text: "Car Added Successfully!",
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
                            location.reload();
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

@endsection