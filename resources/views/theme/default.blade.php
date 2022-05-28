<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('images/fav.jpg') !!}">
    <!-- Pignose Calender -->
    <link href="{!! asset('assets/plugins/pg-calendar/css/pignose.calendar.min.css') !!}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/chartist/css/chartist.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') !!}">

    <link href="{!! asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{!! asset('assets/plugins/sweetalert/css/sweetalert.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div id="main-wrapper">

        @include('theme.header')
        @include('theme.sidebar')
        <div class="content-body">
            @yield('content')
        </div>
    </div>
    <!-- /#wrapper -->

    @include('theme.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</body>

</html>