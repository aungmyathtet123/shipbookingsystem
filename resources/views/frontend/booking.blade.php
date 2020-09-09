@extends('frontendtemplate')
@section('content')
<div class="container mt-5">
	<h4>Contact Detail</h4>
	
		<form method="post" action="{{ route('bookingstore') }}">
			@csrf
			@foreach($bookings as $booking)
			<input type="hidden" name="booking_id" value="{{ $booking->id }}">
			@endforeach
			<div class="row">
			<div class="col-sm-8 col-md-8 col-sm-8">
				<div class="card shadow rounded">
				<div class="row m-5 ">
					
					<div class="col-md-4 col-sm-4">
						<p>Title</p>
						<select class="form-control">
							<option>Mr</option>
							<option>Ms</option>
							<option>Mrs</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						<p>Name</p>

						<input type="text" name="name" class="form-control">
						
					</div>
					<div class="col-md-4 col-sm-4">
						<p>Email</p>

						<input type="text" name="email" class="form-control">
						
					</div>
					<p class="text-primary ml-3"><small class="text-muted">As on ID card/passport/driving license (without degree or special character)</small></p>
					<div class="col-md-4 col-sm-4 mt-3">
						<p>Country</p>
						<select class="form-control">
							<option>Myanmar</option>
							<option>Thailand</option>
							<option>Myanmar</option>
						</select>
						<p class="text-primary ml-3"><small class="text-muted">e.g. +959123456789, for country code</small></p>
					</div>
					<div class="col-md-4 col-sm-4 mt-3">
						<p>Ph-no</p>

						<input type="text" name="phone_no" class="form-control">
						<p class="text-primary ml-3"><small class="text-muted">e.g.(+95) and mobile</small></p>
					</div>
					 
					<div class="col-md-4 col-sm-4 mt-3">
						<p>Review Note</p>

						<textarea class="form-control" name="note"></textarea>
						
					</div>
				
				</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-sm-4">
				<div class="card shadow  border rounded">
					<div class="card  m-3">
						<div class="card-header text-center">
							<input type="hidden" name="route_id" value="{{ $route_id }}">
							<h5>{{ $routename }}</h5>
							<p>{{ $time }}</p>
						</div>
						<div class="card-body text-dark">

							<p class="text-dark"><b> Departure Date</b>&nbsp;&nbsp;&nbsp;{{ $date }}</p>
							<input type="hidden" name="date" value="{{ $date }}">
							<p class="text-dark"><b> Operator_name</b>&nbsp;&nbsp;&nbsp;{{ $opname }}</p>

							<p class="text-dark"><b> Seat Number</b>&nbsp;&nbsp;&nbsp;{{ $seatnumber }}</p>
							<input type="hidden" name="seatnumber" value="{{ $seatnumber }}">
							<p class="text-dark"><b> Subtotal</b>&nbsp;&nbsp;&nbsp;{{ $subtotal }}MMK</p>
							<input type="submit" name="" class="btn btn-success btn-block" value="Confirm">

						</div>
					</div>
				</div>
			</div>
			</div>
		</form>
	
</div>




@endsection