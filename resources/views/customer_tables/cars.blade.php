<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>Vehicle Model</th>
            <th>Vehicle Number</th>
            <th>Seating Capacity</th>
            <th>Rent Per Day</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars as $key=>$car)
        <tr id="dataid{{$car->id}}">
            <td>{{$car->vehicle_model}}</td>
            <td>{{$car->vehicle_number}}</td>
            <td>{{$car->seating_capacity}}</td>
            <td>{{$car->rent}} Rs.</td>
            <td>
                <a href="{{URL::to('/customer/car/booking/')}}/{{$car->id}}" data-toggle="tooltip" data-placement="top" title="Book Now" data-original-title="Book Now">
                    <span class="badge badge-info">BookNow</span>
                </a>
            </td>           
        </tr>
    @endforeach
    </tbody>
</table>