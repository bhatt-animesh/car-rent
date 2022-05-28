<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CarRentalAgency</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('images/fav.jpg') !!}">
    <link href="{!! asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">

</head>
<style>
.content-body {
    margin-top: 7rem;
    margin-left: 0rem;
    z-index: 0;
}
</style>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agency_register') }}"><b>{{ __('Agency Register') }}</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer_register') }}"><b>{{ __('Customer Register') }}</b></a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <span id="message"></span>
                    <div class="card">
                        <div class="card-body">
                            <center><h2>Book a Car</h2></center><hr>
                            <div class="table-responsive" id="table-display">
                                @include('customer_tables.cars')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<script src="{!! asset('assets/plugins/common/common.min.js') !!}"></script>
<script src="{!! asset('assets/js/custom.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/tables/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') !!}"></script>
</body>

</html>