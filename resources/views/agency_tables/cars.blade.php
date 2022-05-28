<table id="tabled" class="table table-striped table-bordered zero-configuration">
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
            <td>{{$car->rent}}</td>
            <td>
                <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$car->id}}')" title="" data-original-title="Edit">
                    <span class="badge badge-info">Edit</span>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" onclick="DeleteData('{{$car->id}}')" title="" data-original-title="Delete">
                    <span class="badge badge-danger">Delete</span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>