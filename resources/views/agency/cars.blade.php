@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/agency/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cars List</a></li>
        </ol>
        <!-- Edit data modal -->
        <div class="modal fade" id="EditCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editcar" class="editcar" id="editcar" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Edit Car Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span id="emsg"></span>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="form-group">
                                <label for="vehicle_model" class="col-form-label">Vehicle Model:</label>
                                <input type="text" class="form-control" id="getvehicle_model" name="vehicle_model" placeholder="IP/URL">
                            </div>
                            <div class="form-group">
                                <label for="vehicle_number" class="col-form-label">Vehicle Number:</label>
                                <input type="text" class="form-control" id="getvehicle_number" name="vehicle_number" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="rent" class="col-form-label">Rent Per Day:</label>
                                <input type="text" class="form-control" id="getrent" name="rent" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="seating_capacity" class="col-form-label">Seating Capacity:</label>
                                <input type="text" class="form-control" id="getseating_capacity" name="seating_capacity" placeholder="Port Number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit data modal -->
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Cars List</h4>
                    <div class="table-responsive" id="table-display">
                        @include('agency_tables.cars')
                    </div>
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
    
     $('#editcar').on('submit', function(event){
         event.preventDefault();
         var form_data = new FormData(this);
         $.ajax({
             url:"{{ URL::to('agency/cars/edit') }}",
             method:'POST',
             data:form_data,
             cache: false,
             contentType: false,
             processData: false,
             dataType: "json",
             success: function(result) {
                if (result.success.includes("Updated")){
                    swal({
                        title: "Success",
                        text: "Car Details updated Successfully!",
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
                            $("#EditCar").modal('hide');
                            CarsTable();
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
         });
     });
});

function GetData(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ URL::to('agency/cars/show') }}",
        data: {
            id: id
        },
        method: 'POST', 
        dataType: 'json',
        success: function(response) {
            jQuery("#EditCar").modal('show');
            $('#id').val(response.ResponseData.id);
            $('#getvehicle_model').val(response.ResponseData.vehicle_model);
            $('#getvehicle_number').val(response.ResponseData.vehicle_number);
            $('#getrent').val(response.ResponseData.rent);
            $('#getseating_capacity').val(response.ResponseData.seating_capacity);
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}

function CarsTable() {
    $.ajax({
        url:"{{ URL::to('agency/cars/list') }}",
        method:'get',
        success:function(data){
            $('#table-display').html(data);
            $(".zero-configuration").DataTable()
        }
    });
}


function DeleteData(id) {
    // dd(id);
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this Car?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plz!",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true,
    },
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{ URL::to('agency/cars/destroy') }}",
                data: {
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "Approved!",
                            text: "Car has been deleted.",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $('#dataid'+id).remove();
                                swal.close();
                            }
                        });
                    } else {
                        swal("Cancelled", "Something Went Wrong :(", "error");
                    }
                },
                error: function(e) {
                    swal("Cancelled", "Something Went Wrong :(", "error");
                }
            });
        } else {
            swal("Cancelled", "Your car record is safe :)", "error");
        }
    });
}
</script>
@endsection