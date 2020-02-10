<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/admin/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    @yield('css')
</head>

<body>
<div class="wrap-dashboard">
    @include('admin.layouts.menu')
    @include('admin.layouts.header')
    @yield('content')
</div>
<!-- js placed at the end of the document so the pages load faster -->

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
@yield('js')
</body>

</html>
