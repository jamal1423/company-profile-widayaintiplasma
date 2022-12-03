<!Doctype html>
<html lang="en">
<head>
		<!-- TITLE OF SITE -->
		<title>About Us</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('gambar-umum/logo_wip.png') }}">
		
		<!--font-family-->
		<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya+SC:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
		
		<!--font-awesome/ flaticon-->
		<link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet" type="text/css"/>	
		<link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>		
		
		<!--Animate.css-->
		<link href="{{ asset('frontend/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
		
		<!--lsb.css-->
		<link href="{{ asset('frontend/assets/css/lsb.css') }}" rel="stylesheet" type="text/css"/>		
		
		<!--Responsive-menu.css-->
		<link href="{{ asset('frontend/assets/css/responsive-menu.css') }}" rel="stylesheet" type="text/css"/>		
		
		<!--bootstrap.min.css-->
		<link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		
		<!--style.css-->
		<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
		
		<!--Responsive.css-->
		<link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
    
    <!-- Start Pre-loader -->
		<div id="loading">
      <div id="loading-center">
        <div id="loading-center-absolute">
          <div class="object" id="object_one"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_three"></div>
				</div>
			</div>
		</div>
		<!-- End Pre-loader -->
    
    <!-- Start header -->
    <div class="head-bg">
      @include('frontend.partials.en.header')
    </div>
		
    <!-- CONTENT -->
		@yield('content')
		
		<!-- FOOTER -->
    @include('frontend.partials.en.footer')
	
		<!--jquery,bootstrap-->
		<script src="{{ asset('frontend/assets/jsmodernizr.js') }}" type="text/javascript"></script>
		<script src="{{ asset('frontend/assets/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
		
		<!-- Counterup -->
		<script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}" type="text/javascript"></script>
		
		<!-- lsb -->
		<script src="{{ asset('frontend/assets/js/lsb.js') }}"></script>
		
		<!--Responsive-menu.js-->
		<script src="{{ asset('frontend/assets/js/responsive-menu.js') }}"></script>		
		
		<!-- wow.min.js -->
		<script src="{{ asset('frontend/assets/js/wow.min.js') }}" type="text/javascript"></script>
		
		<!-- Gmaps -->
		<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBZ9LCkJO6IPkR-DndlDs5UPMeoDNKa7LA"></script> -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyD7xQ5nhCaQrlNI1IPawjp3c_jWraWpdrc"></script>
		<script src="{{ asset('frontend/assets/js/gmaps.js') }}" type="text/javascript"></script>
		
		<!-- Custom.js -->
		<script src="{{ asset('frontend/assets/js/custom.js') }}" type="text/javascript"></script>
		
	</body>
</html>