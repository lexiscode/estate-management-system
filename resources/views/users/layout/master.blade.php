<!DOCTYPE html>
<html lang="en">

<head>
    <title>RealEstate Management</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('users/assets/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('users/assets/style.css') }}" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('users/assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('users/assets/script.js') }}"></script>



    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('users/assets/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('users/assets/owl-carousel/owl.theme.css') }}">
    <script src="{{ asset('users/assets/owl-carousel/owl.carousel.js') }}"></script>
    <!-- Owl stylesheet -->


    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('users/assets/slitslider/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('users/assets/slitslider/css/custom.css') }}" />
    <script type="text/javascript" src="{{ asset('users/assets/slitslider/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ asset('users/assets/slitslider/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('users/assets/slitslider/js/jquery.slitslider.js') }}"></script>
    <!-- slitslider -->

</head>

<body>

    <!-- header section-->
    @include('users.layout.header')


    <!-- main menu here -->
    @yield('home')
    @yield('about')
    @yield('agents')
    @yield('blog')
    @yield('contact')

    <!-- header menu here -->
    @yield('buysalerent')

    <!-- Registration page here -->
    @yield('register')

    <!-- Forgot password page here-->
    @yield('forgot-password')

    <!-- Property details here-->
    @yield('property-details')

    <!-- Blog detail here-->
    @yield('blog-detail')


    <!-- footer section -->
    @include('users.layout.footer')


</body>

</html>
