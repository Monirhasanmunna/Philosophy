<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Philosophy</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('frontend/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('frontend/js/modernizr.js')}}"></script>
    <script src="{{asset('frontend/js/pace.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">
    @toastr_css
    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader @yield('home_header_design')">
       
        @include('layouts.frontend.partial.header')


        @yield('pageheader')

    </section> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
        @yield('content')
    </section> <!-- s-content -->


    <!-- s-extra
    ================================================== -->
   @include('layouts.frontend.partial.popular')


    <!-- s-footer
    ================================================== -->
   @include('layouts.frontend.partial.footer')


    <!-- preloader
    ================================================== -->
    @yield('loder')


    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
    <!-- Java Script
    ================================================== -->
    <script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>