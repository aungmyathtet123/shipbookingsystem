@extends('backend')
@section('content')

<div class="container">
 	<h3>city edit form</h3>
 	<form action="{{route('booking.update',$booking->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="name" value="{{$booking->name}}">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="email" value="{{$booking->email}}">
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('phone_no') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Phone_no</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="phone_no" value="{{$booking->phone_no}}">
					<span class="text-danger">{{ $errors->first('phone_no') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('note') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Note</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="note" value="{{$booking->note}}">
					<span class="text-danger">{{ $errors->first('note') }}</span>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Update">
				</div>
			</div>
		</form>
 </div>
 
@endsection