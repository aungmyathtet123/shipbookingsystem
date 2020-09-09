@extends('frontendtemplate')
@section('content')

<div class="container">

	<div class="row">

		<div class="col-lg-8">
			@if($type == 'upper')
			@php 
			$seats = $route->Ship->max_upseat;
			@endphp

			<div class="card" id="upper">
				<div class="card-header">
					<div class="card-text">Please select  seat</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<input type="text" name="Upper" value="" placeholder=" For Upper" class="form-control" readonly="">
							<div class="row">
								@for ($i=1; $i <=$seats; $i++)	
									@if(in_array($i, $occupySeatsArray))								
										<div class="col-2 p-3 m-3" id="lock"><i class="fas fa-lock"></i></div>
									@else 
									<a class=" btn col-2  p-3 m-3 nolock" style="background-color: gray" data-price="{{ $route->upper_price }}" data-seat="{{ $i }}">{{ $i }}</a>
									@endif
								@endfor

							</div>
						</div>
					</div>

				</div>
			</div>
			@elseif($type == 'lower')
			@php 
			$low_seats = $route->Ship->max_lowseat;
			@endphp

			<div class="card" id="upper">
				<div class="card-header">
					<div class="card-text">Please select  seat</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<input type="text" name="Upper" value="" placeholder=" For Lower" class="form-control" readonly="">
							<div class="row">
								{{-- <div class="col-2 p-3 m-3" id="lock"><i class="fas fa-lock"></i></div> --}}

								@for ($i=1; $i <=$low_seats; $i++)
								@if(in_array($i, $occupySeatsArray))								
										<div class="col-2 p-3 m-3" id="lock"><i class="fas fa-lock"></i></div>
									@else 									
								<a class=" btn col-2  p-3 m-3 nolock" style="background-color: gray" data-price="{{ $route->lower_price }}" data-seat="{{ $i }}">{{ $i }}</a>
								@endif
								@endfor




							</div>
						</div>
					</div>

				</div>
			</div>
			@endif

		</div>


		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<div class="card-text">Trip Info</div>
				</div>
				<div class="card-body">

					<form method="post" action="{{ route('store') }}">
						@csrf
						<table class="table table-striped">
							<tbody>

								<tr>
									<th scope="row">Operator</th>
									<td>{{ $route->Ship->Operator->name}}</td>
									<input type="hidden" name="route_id" value={{ $route->id }}>
									{{-- <input type="hidden" name="route_date" value={{ $date }}> --}}

									<input type="hidden" name="opname" value="{{ $route->Ship->Operator->name}}">
								</tr>
								<tr>
									<th scope="row">Route</th>
									<td>{{$from->name}}-{{$to->name}}</td>
									<input type="hidden" name="routename" value="{{$from->name}}-{{$to->name}}">



								</tr>

								<tr>
									<th scope="row">Departure Date</th>

									<td>{{$date}}</td>
									<input type="hidden" name="date" value="{{$date}}">

								</tr>
								<tr>
									<th scope="row">Departure Time</th>

									<td>{{$route->time}}</td>
									<input type="hidden" name="time" value="{{$route->time}}">

								</tr>


								<tr>
									<th scope="row">Subtotal</th>
									<td class="subtotal"></td>
									<input type="hidden" name="subtotal">
								</tr>
							</tbody>
						</table>
						<h5 class="text-center">Your Seat Number</h5>

						<div class="text-center seat_number"></div>
						<input type="hidden" name="seatnumber" >

						<input type="submit" name="" class="btn btn-success btn-block" value="Continue to Traveller Info">
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function () {

		let totalSeats = [];
		let totalPrice = 0;

		$('#upper').on('click','.nolock',function () {
				var color= this.style.backgroundColor;
				var price=$(this).data('price');
				var seat=$(this).data('seat');
				if(color=='gray'){
					this.style.background='red';
					totalSeats.push(seat);
					totalPrice += price;

				}else{
					this.style.background='gray';
					totalSeats = arrayRemove(totalSeats, seat);
					totalPrice -= price;

				}
				$('.subtotal').text(totalPrice);
				document.getElementsByName('subtotal')[0].value = totalPrice;
				$('.seat_number').text(totalSeats);
				document.getElementsByName('seatnumber')[0].value = totalSeats;

				// console.log(totalSeats, totalPrice);
				
			})


		// remove array element
		function arrayRemove(arr, value) { 
			return arr.filter(function(ele){ return ele != value; });
		}


	})
</script>
@endsection



