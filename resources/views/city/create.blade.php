@extends('backend')
@section('content')

 <div class="container">
 	<h3>City create form</h3>
 	<form action="{{route('city.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="name">
					<span class="text-danger">{{ $errors->first('name') }}</span>
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