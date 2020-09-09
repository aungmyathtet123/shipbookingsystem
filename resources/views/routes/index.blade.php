@extends('backend')
@section('content')

 <div class="container-fluid">
		<h2 class="d-inline-block">Operator List</h2>
		<a href="{{route('routes.create')}}" class="btn btn-primary">Add new</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>City_From</th>
					<th>City_to</th>
					<th>Ship_id</th>

					<th>Time</th>
					<th>Upper</th>
					<th>Lower</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					@foreach($routes as $route)
					<tr>
					<td>{{$route->city_from}}</td>
					<td>{{$route->city_to}}</td>
					<td>{{$route->ship_id}}</td>
					<td>{{$route->time}}</td>
					<td>{{$route->upper_price}}</td>
					<td>{{$route->lower_price}}</td>

					<td>{{-- <a href="{{route('routes.edit',$route->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a> --}}
					<form method="post" action="{{route('routes.destroy',$route->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-submit" class="btn btn-danger btn-delete"><i class='fas fa-trash'></i>DElETE</button>
						</form></td>

				</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>


@endsection