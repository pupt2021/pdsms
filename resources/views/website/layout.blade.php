<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PDSMS - Patient and Dental Supply Monitoring System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/dms_images/pup.ico" />
   <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">-->

    <link rel="stylesheet" href="{{asset('assets/dms_css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/dms_css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('assets/dms_css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/dms_css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/dms_css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('assets/dms_css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dms_css/style.css')}}">
  </head>
  <body>
  {{View::make('website.header')}}
      @yield('content')
  {{View::make('website.footer')}}

  <script src="{{asset('assets/dms_js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/popper.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/aos.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('assets/dms_js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('assets/dms_js/scrollax.min.js')}}"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
  <!--<script src="{{asset('assets/dms_js/google-map.js')}}"></script>-->
  <script src="{{asset('assets/dms_js/main.js')}}"></script>
    
  </body>
</html>

