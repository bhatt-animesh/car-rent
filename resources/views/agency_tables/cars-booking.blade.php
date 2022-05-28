<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>Booked By</th>
            <th>Vehicle Model</th>
            <th>Number Of Day</th>
            <th>Date Of Booking</th>
            <th>Total Payable Amount</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars_bookings as $key=>$book)
        <tr id="dataid{{$book->id}}">
            <td>{{$book['user_details']->name}}</td>
            <td>{{$book['car_details']->vehicle_model}}</td>
            <td>{{$book->number_of_day}}</td>
            <td>{{$book->date_of_booking}}</td>
            <td>{{$book->number_of_day * $book['car_details']->rent}} Rs.</td>
        </tr>
    @endforeach
    </tbody>
</table>