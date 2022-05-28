<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            
            @if (auth()->user()->role_id == 1)
                <li>
                    <a href="{{URL::to('/agency/home')}}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-car"></i><span class="nav-text">Cars</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{URL::to('/agency/cars/add')}}">○ Add Car</a></li>
                    </ul>
                    <ul aria-expanded="false">
                        <li><a href="{{URL::to('/agency/cars')}}">○ Cars List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{URL::to('/agency/cars/booking')}}" aria-expanded="false">
                        <i class="fa fa-calendar-check-o"></i><span class="nav-text">Booked Cars</span>
                    </a>
                </li>
            @elseif (auth()->user()->role_id == 2)
                <li>
                    <a href="{{URL::to('/customer/home')}}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Book Car</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/customer/mybooking')}}" aria-expanded="false">
                        <i class="fa fa-calendar-check-o"></i><span class="nav-text">My Bookings</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->