<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>Status</th>
            <th>Vehicle Model</th>
            <th>Vehicle Number</th>
            <th>Number Of Day</th>
            <th>Date Of Booking</th>
            <th>Total Payable Amount</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mybookings as $key=>$book)
        <tr id="dataid{{$book->id}}">
            <td><span class="badge badge-success">Booked</span></td>
            <td>{{$book['car_details']->vehicle_model}}</td>
            <td>{{$book['car_details']->vehicle_number}}</td>
            <td>{{$book->number_of_day}}</td>
            <td>{{$book->date_of_booking}}</td>
            <td>{{$book->number_of_day * $book['car_details']->rent}} Rs.</td>
        </tr>
    @endforeach
    </tbody>
</table>