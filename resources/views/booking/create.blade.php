@extends('backend')
@section('content')

 <div class="container">
 	<h3>Booking create form</h3>
 	<form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="name">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="email">
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>


			
			<div class="form-group row {{ $errors->has('phone_no') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Phone_No</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="phone_no">
					<span class="text-danger">{{ $errors->first('phone_no') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('note') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Note</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="note">
					<span class="text-danger">{{ $errors->first('note') }}</span>
				</div>
			</div>
			
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Add City">
				</div>
			</div>
		</form>
 </div>
@endsection