@extends('backend')
@section('content')

 <div class="container-fluid">
		<h2 class="d-inline-block">Operator List</h2>
		<a href="{{route('ship.create')}}" class="btn btn-primary">Add new</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Max-upseat</th>
					<th>Max-lowseat</th>


					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
					@foreach($ships as $ship)
					<tr>
					<td>{{$ship->id}}</td>
					<td>{{$ship->max_upseat}}</td>
					<td>{{$ship->max_lowseat}}</td>
					<td><a href="{{route('ship.edit',$ship->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
					<form method="post" action="{{route('ship.destroy',$ship->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
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