@extends('backend')
@section('content')

 <div class="container">
 	<h3>ship create form</h3>
 	<form action="{{route('ship.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row {{ $errors->has('operator_id') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">Operator</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="operator_id">
						<optgroup label="Choose Brand">
							@foreach($operators as $operator)
								<option value="{{$operator->id}}">{{$operator->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('operator') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Max-UpperSeat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="max_upseat">
					<span class="text-danger">{{ $errors->first('max_upseat') }}</span>
				</div>
			</div>

				<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Max-LowerSeat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="max_lowseat">
					<span class="text-danger">{{ $errors->first('max_lowseat') }}</span>
				</div>
			
			
			
			<div class="form-group row">
				<div class="col-sm-5">
					<input type="submit" class="btn btn-primary" name="btnsubmit" value="Create">
				</div>
			</div>
		</form>
 </div>
@endsection