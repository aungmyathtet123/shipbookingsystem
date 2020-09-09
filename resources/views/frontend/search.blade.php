@extends('frontendtemplate')
@section('content')

<div class="container mt-5">
	
		
		<div class="card p-3">
			<div class="row mt-4">
				
					
				<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
						{{-- <label class="form group">To</label> --}}

					<div>
						To<select class="chosen-select" tabindex="2" id="from" name="from">
							<option value="{{$from->id}}">{{$from->name}}</option>

							@foreach($cities as $city)

								<option value="{{ $city->id }}">{{$city->name}}</option>
							@endforeach	
						</select>
					</div>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
						{{-- <label class="form group">From</label> --}}

					<div>

						From<select  class="chosen-select" tabindex="2" id="to">
							<option value="{{ $to->id }}">{{$to->name}}</option>

							@foreach($cities as $city)

								<option value="{{ $city->id }}">{{$city->name}}</option>
							@endforeach	
						</select>
					</div>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
						{{-- <label class="form group">Department Date</label> --}}

					<div class="form-group">
						Department Date<input type="Date" name="date" class="form-control" id="date" style="width:13rem;"value="{{ $date }}" >
					</div>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-4">
					<div class="form-group">
						<button class="btn btn-success edit btn-block">Edit</button>


					</div>
				</div>
			
			</div>
		</div>
	
	</div>

	<div class="container mt-5" id="sidebar">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">

				<div class="card">
					
					<div class="card-body">
						<h5> Search By Operator</h5>
						<hr>
						<div class="form-group">
						<ul type="none">

							<?php 


							$connect = new PDO("mysql:host=localhost;dbname=ship_db", "root", "");

							?>

							<?php
							$i=1;

							$query = "SELECT * FROM operators";
							$statement = $connect->prepare($query);
							$statement->execute();
							$result = $statement->fetchAll();
							foreach($result as $row)
							{
								?>
								<div class="checkbox">
								<a href="#" class="filter  text-decoration-none" data-id="<?php echo $row['id'] ?>"><p class="text-dark"><input type="checkbox" class="common_selector brand">&nbsp;<?php echo $row['name']; ?></p></a>
								</div>
								{{-- <div class="list-group-item checkbox">
									<label><input type="checkbox" class="common_selector brand" value="<?php echo $row['id'] ?>" ><?php echo $row['name']; ?></label>
								</div> --}}
								<?php
							}

							?>
							
						</ul>
					</div>
					</div>
				</div>


			</div>

			

			<div class="col-sm-9 col-md-9 col-lg-9" id="route">
								
				 
				@foreach($routes as $route) 
				
				
				<div class="card mt-3">

					<div class="row p-5">
						<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
							<div class="row">
								<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
									<img src="{{$route->Ship->Operator->photo}}" class="card-img-top">
								</div>
								<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
									
									<b>{{$route->time}}</b><br>
									
									

									 {{$route->Ship->Operator->name}}<br>
								<b class="text-danger">allow 1bag free</b>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<b>Trip City</b><br>
							{{$from->name}}-{{ $to->name }}
							{{ $date }}
						</div>
						<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<b>{{ $route->lower_price }}(MMK)</b><br>
							<div class="form-group">
								
								<a href="{{ route('seat',[$route->id, 'lower',$date]) }}" class="btn btn-block btn-success">Standard</a>
							</div>
						</div>
						
						<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">

							<b>{{ $route->upper_price }}(MMK)</b><br>

								<div class="form-group">
								
								<a href="{{ route('seat',[$route->id,'upper',$date]) }}" class="btn btn-block btn-success">Upper</a>
								
							</div>
						
							
							
						</div>
					</div>
				</div>

				
				@endforeach
				
				
			</div>




			

			
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">

	
	$(document).ready(function () {


	
		 
    
			   $.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  }
					});


		

		$(".edit").on('click',function(){



			
        var from=$('#from').val();
        var to=$('#to').val();
		var date=$('#date').val();
		

		$.post("{{ route('editsearch') }}",{from:from,to:to,date:date},function (res) {
			console.log(res);
						
						var from=res[1].name;
						var to=res[2].name;
						var date=res[4];
						


						console.log(from,to,date);
						var html="";
						var sidebar="";
						$.each(res[0],function(i,v){
							var upper="upper";
							var lower="lower";
							

							 
							 var url="{{route('seat',[':id',':type',':date'])}}";

						        url = url.replace(':id',v.id);
								
	      						url = url.replace(':type',upper);
	      						url = url.replace(':type',date);

	      						console.log(url);


	      						var lower_url="{{route('seat',[':id',':type',':date'])}}";

						       lower_url = lower_url.replace(':id',v.id);
								
	      						lower_url = lower_url.replace(':type',lower);
	      						lower_url = lower_url.replace(':date',date);

			        
					        var csrf='@csrf';



					html+=`<div class="card mt-3">

				        <div class="row p-5">
				        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				        <div class="row">
				        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
				        <img src="${v.ship.operator.photo}" class="card-img-top">
				        </div>
				        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
				        
				        <b>${v.time}</b><br>
				        
				        

				        ${v.ship.operator.name}<br>
				        <b class="text-danger">allow 1 bag free</b>
				        </div>
				        </div>
				        </div>
				        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
				        <b>Trip City</b><br>
				        ${from}-${to}
				        ${date}
				        </div>
				        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
				        <b>${ v.lower_price }(MMK)</b><br>
				        <div class="form-group">
				        
				        <a href="${lower_url}" class="btn btn-block btn-warning">Standard</a>
				        </div>
				        </div>
				        
				        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">

				        <b>${v.upper_price }(MMK)</b><br>

				        <div class="form-group">
				        
				        <a href="${url}" class="btn btn-block btn-warning">Upper</a>
				        
				        </div>
				        
				        
				        
				        </div>
				        </div>
				        </div>`

				    
						    
				      })
				      $('#route').html(html);
				      
				       }) 
      

						})



				$('.filter').on('click',function () {

					 var from=$('#from').val();
			        var to=$('#to').val();
			        var id=$(this).data('id');
			        var date=$('#date').val();
			        // alert(id);
			        $.post("{{ route('filter') }}",{from:from,to:to,id:id,date:date},function (res) {
			console.log(res);


						var operator_photo=res[1].photo;
						var operator_name=res[1].name;

						var from=res[2].name;
						var to=res[3].name;
						var date=res[4];
						


						console.log(from,to,date);
						var html="";
						var sidebar="";
						$.each(res[0],function(i,v){
							var upper="upper";
							var lower="lower";
							

							 
							 var url="{{route('seat',[':id',':type',':date'])}}";

						        url = url.replace(':id',v.id);
								
	      						url = url.replace(':type',upper);
	      						url = url.replace(':type',date);

	      						console.log(url);


	      						var lower_url="{{route('seat',[':id',':type',':date'])}}";

						       lower_url = lower_url.replace(':id',v.id);
								
	      						lower_url = lower_url.replace(':type',lower);
	      						lower_url = lower_url.replace(':date',date);

			        
					        var csrf='@csrf';



					html+=`<div class="card mt-3">

				        <div class="row p-5">
				        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				        <div class="row">
				        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
				        <img src="${operator_photo}" class="card-img-top">
				        </div>
				        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
				        
				        <b>${v.time}</b><br>
				        
				        

				        ${operator_name}<br>
				        <b class="text-danger">allow 1 bag free</b>
				        </div>
				        </div>
				        </div>
				        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
				        <b>Trip City</b><br>
				        ${from}-${to}
				        ${date}
				        </div>
				        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
				        <b>${ v.lower_price }(MMK)</b><br>
				        <div class="form-group">
				        
				        <a href="${lower_url}" class="btn btn-block btn-warning">Standard</a>
				        </div>
				        </div>
				        
				        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">

				        <b>${v.upper_price }(MMK)</b><br>

				        <div class="form-group">
				        
				        <a href="${url}" class="btn btn-block btn-warning">Upper</a>
				        
				        </div>
				        
				        
				        
				        </div>
				        </div>
				        </div>`

				    
						    
				      })
				      $('#route').html(html);


		})
					
					
				})
				




				})	

							
					
	


			
	
	
</script>
@endsection
