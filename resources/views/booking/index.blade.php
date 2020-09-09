@extends('backend')
@section('content')

 <div class="container-fluid">
		<h2 class="d-inline-block">Operator List</h2>
		<a href="{{route('booking.create')}}" class="btn btn-primary">Add new</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Name</th>
					<th>Email</th>

					<th>Phno_no</th>
					<th>Note</th>

					

					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookings as $booking)
				<tr>
					<td>{{$booking->id}}</td>
					<td>{{$booking->name}}</td>
					<td>{{$booking->email}}</td>
					<td>{{$booking->phone_no}}</td>
					<td>{{$booking->note}}</td>

					<td><a href="{{route('booking.edit',$booking->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
					<form method="post" action="{{route('booking.destroy',$booking->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
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