@extends('backend')
@section('content')

 <div class="container">
 	<h3>Route create form</h3>
 	<form action="{{route('routes.store')}}" method="post">
			@csrf
			<div class="form-group row {{ $errors->has('city_from') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">City_from</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="city_from">
						<optgroup label="Choose city">
							@foreach($cities as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('city_from') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('city_to') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">City_to</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="city_to">
						<optgroup label="Choose city">
							@foreach($cities as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('city_to') }}</span>
				</div>
			</div>


			<div class="form-group row {{ $errors->has('ship_id') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">Ship_id</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="ship_id">
						<optgroup label="Choose city">
							@foreach($ships as $ship)
								<option value="{{$ship->id}}">{{$ship->id}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('ship_id') }}</span>
				</div>
			</div>



			<div class="form-group row {{ $errors->has('time') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Time</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="time">
					<span class="text-danger">{{ $errors->first('time') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('upper_price') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Upper-price</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="upper_price">
					<span class="text-danger">{{ $errors->first('upper_price') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('lower_price') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Lower_price</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="lower_price">
					<span class="text-danger">{{ $errors->first('lower_price') }}</span>
				</div>
			</div>
			
			
			
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Create">
				</div>
			</div>
		</form>
 </div>
@endsection