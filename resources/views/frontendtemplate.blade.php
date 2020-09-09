<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
  	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/chosen/chosen.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

	<style type="text/css">


	</style>
	
</head>
<body style="background-color: #f2efe9;">


	@yield('navbar')

	
	
	@yield('content')
	






	<!-- div class="container mt-5">
		<h3 class="text-center">Relate Paratner</h3>
		<div class="row mt-5">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img src="images/bg1.jpg" class="img-fluid">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img src="images/bg1.jpg" class="img-fluid">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img src="images/bg1.jpg" class="img-fluid">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img src="images/bg1.jpg" class="img-fluid">
			</div>

	</div> -->

	<!-- Footer -->
	@yield('footer')


<script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('frontend/chosen/chosen.jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/chosen/init.js')}}" type="text/javascript" charset="utf-8"></script>
@yield('script')


</body>
</html>
