@extends('backend')
@section('content')

 <div class="container-fluid">
		<h2 class="d-inline-block">Operator List</h2>
		<a href="{{route('operator.create')}}" class="btn btn-primary">Add new</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Name</th>
					<th>Photo</th>

					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($operators as $operator)
				<tr>
					<td>{{$operator->id}}</td>
					<td>{{$operator->name}}</td>
					<td><img src="{{asset($operator->photo)}}" width="100"></td>
					<td><a href="{{route('operator.edit',$operator->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
					<form method="post" action="{{route('operator.destroy',$operator->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
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