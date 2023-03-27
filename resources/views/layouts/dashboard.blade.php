<!DOCTYPE html>
<!-- 
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">
<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>smartholidays</title>
    <meta name="description" content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap."/>
    
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Daterangepicker CSS -->
    <link href="{{asset('asset/vendors/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/css/custom.css')}}" rel="stylesheet" type="text/css">

	<!-- Data Table CSS -->
    <link href="{{asset('asset/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />

	<!-- CSS -->
    <link href="{{asset('asset/dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
   	<!-- Wrapper -->
	<div class="hk-wrapper" data-layout="horizontal" data-layout-style="default" data-menu="light" data-footer="simple">
		<!-- Top Navbar -->
		 <!-- here is the fixed navbar -->
         @include('layouts.partial.fixed_navbar')

		<!-- /Top Navbar -->

        <!-- Horizontal Nav -->
		
        <!-- here is the horizantal navbar -->
        @include('layouts.partial.horizantal_navbar')
        <!-- /Horizontal Nav -->

	

		<!-- Main Content -->
		<div class="hk-pg-wrapper">
			<div class="container mt-4">
            <!-- content -->
            @yield('content')
            <!-- end content -->

			</div>
			
			<!-- Page Footer -->
        @include('layouts.partial.footer')
            <!-- / Page Footer -->

		</div>
		<!-- /Main Content -->









	</div>
    <!-- /Wrapper -->

	<!-- jQuery -->
    <script src="{{asset('asset/vendors/jquery/dist/jquery.mi')}}n.js"></script>

    <!-- Bootstrap Core JS -->
   	<script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- FeatherIcons JS -->
    <script src="{{asset('asset/dist/js/feather.min.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('asset/dist/js/dropdown-bootstrap-extended.js')}}"></script>

	<!-- Simplebar JS -->
	<script src="{{asset('asset/vendors/simplebar/dist/simplebar.min.js')}}"></script>
	
	<!-- Data Table JS -->
    <script src="{{asset('asset/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('asset/vendors/datatables.net-select/js/dataTables.select.min.js')}}"></script>

	<!-- Daterangepicker JS -->
    <script src="{{asset('asset/vendors/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('asset/vendors/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('asset/dist/js/daterangepicker-data.js')}}"></script>

	<!-- Amcharts Maps JS -->
	<script src="{{asset('asset/vendors/@amcharts/amcharts4/core.js')}}"></script>
	<script src="{{asset('asset/vendors/@amcharts/amcharts4/maps.js')}}"></script>
	<script src="{{asset('asset/vendors/@amcharts/amcharts4-geodata/worldLow.js')}}"></script>
	<script src="{{asset('asset/vendors/@amcharts/amcharts4-geodata/worldHigh.js')}}"></script>
	<script src="{{asset('asset/vendors/@amcharts/amcharts4/themes/animated.js')}}"></script>

	<!-- Apex JS -->
	<script src="{{asset('asset/vendors/apexcharts/dist/apexcharts.min.js')}}"></script>

	<!-- Init JS -->
	<script src="{{asset('asset/dist/js/init.js')}}"></script>
	<script src="{{asset('asset/dist/js/chips-init.js')}}"></script>
	<script src="{{asset('asset/dist/js/dashboard-data.js')}}"></script>
</body>
</html>