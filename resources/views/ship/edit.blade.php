@extends('backend')
@section('content')

<div class="container">
 	<h3>city edit form</h3>
 	<form action="{{route('ship.update',$ship->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row {{ $errors->has('operator_id') ? 'has-error' : '' }}">
				<label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
				<div class="col-sm-5">
					<select class="form-control form-control-md" id="inputBrand" name="operator_id">
						<optgroup label="Choose Brand">
							@foreach($operators as $operator)
								<option value="{{$operator->id}}" @if($operator->id == $ship->operator_id){{'selected'}} @endif>{{$operator->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('brand') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('max_upseat') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Max_upseat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="max_upseat" value="{{$ship->max_upseat}}">
					<span class="text-danger">{{ $errors->first('max_upseat') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('max_lowseat') ? 'has-error' : '' }}">
				<label for="inputName" class="col-sm-2 col-form-label">Max_lowseat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="inputName" name="max_lowseat" value="{{$ship->max_lowseat}}">
					<span class="text-danger">{{ $errors->first('max_lowseat') }}</span>
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