@extends('frontendtemplate')
@include('frontend.nav')
@section('content')

<div class="container mt-5">
    
		<div class="row">

			<div class="col-lg-6 col-md-12 col-sm-12 col-md-6 col-xl-6 col-xs-6 m-0 p-0">

                <form action="{{route('search')}}" method="post">
                    @csrf
				<div class="card shadow rounded">
					<div class="row p-4">

						<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 mt-3">
                            
							<label class="form group">To</label>
							<div>
								<select class="form-control form-control-md" id="cityfrom" name="city_from">
							<optgroup label="Choose city">
							@foreach($cities as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach	
						</optgroup>
					</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 mt-3">
							<label class="form group">From</label>
							<div>
								<select class="form-control form-control-md" id="cityto" name="city_to">
						<optgroup label="Choose city">
							@foreach($cities as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach	
						</optgroup>
					</select>
							</div>	
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 mt-3">
							<div class="form-group">
								{{-- <label class="form group">Select Date</label> --}}
								<input type="Date" name="date" class="form-control" placeholder="select Date" id="date">
							</div>	
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 mt-3">
							
                            <input type="submit" class="btn btn-success search btn-block" value="search">
                            </div>

                            {{-- <a type="submit" href="{{ route('search')}}" class=" search btn btn-outline-warning d-block">Search</a> --}}
							
						
						{{-- <div class="col-lg-6 offset-lg-3 col-md-12 offset-md-3 col-sm-12 offset-sm-3 col-xl-6 mt-3">
							<a href="" class="btn btn-outline-warning d-block">Search</a>
						</div> --}}
                    
					</div>
				</div>
                </form>		
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-xl-3 col-xs-3 m-0 p-0">
				<div class="card  text-center p-2">
					<div class="card-body">
						<img src="{{asset('frontend/images/homeship.jpg')  }}" class="card-image-top">
					</div>		
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 col-xl-3 col-xs-3">
				<div class="card shadow rounded text-center bg-danger">
					<div class="card-body text-center text-white"> 
						<h3>50 Percent Discount For 2 Person</h3>
						<p>You can go Saving,Relaxing</p>
					</div>		
				</div> 
			</div>
		</div>	
    </from>
	</div>
	


 

<div class="container mt-5">

	<h4 class="text-center">Popular Pop</h4>
	<hr class="my-4">

	<!--Carousel Wrapper-->
	<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">



		<!--Indicators-->
      <!-- <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active btn btn-primary"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
    </ol> -->
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

    	<!--First slide-->
    	<div class="carousel-item active">

    		<div class="row">
                @foreach($operators as $operator)
    			<div class="col-md-4 clearfix d-none d-md-block">
    				<div class="card shadow rounded mb-2">
    					<img class="card-img-top" src=" {{ $operator->photo }} "
    					alt="Card image cap">
    					<div class="card-body">
    						<h4 class="card-title">Card title</h4>
    						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the
    						card's content.</p>
    						<a class="btn btn-primary">Button</a>
    					</div>
    				</div>
    			</div>
                @endforeach
    			
    		</div>

    	</div>
    	<!--/.First slide-->

    	<!--Second slide-->
    	<div class="carousel-item">

            <div class="row">
                @foreach($operators as $operator)
                <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card shadow rounded mb-2">
                        <img class="card-img-top" src=" {{ $operator->photo }}"
                        alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>

        </div>
    	<!--/.Second slide-->

    	<!--Third slide-->
    	<div class="carousel-item">

            <div class="row">
                @foreach($operators as $operator)
                <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card shadow rounded mb-2">
                        <img class="card-img-top" src="{{ $operator->photo }}"
                        alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>

        </div>
    	<!--/.Third slide-->

    </div>

    <!--Controls-->
    <div class="controls-top text-center">
    	<a class=" btn btn-primary" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
    	<a class=" btn btn-primary" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

    <!--/.Slides-->

</div>
</div>

<div class="container mt-5">

	<h3 class="text-center">Related Paratner</h3>
	<hr class="my-4">
	<div class="row mt-5">
        @foreach($operators as $operator)
		<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
			<img src="{{ $operator->photo }}" class="img-fluid">
            <p class="text-center">{{ $operator->name }}</p>
		</div>
        @endforeach
		
	</div>
</div>	

@endsection
@include('frontend.footer')
{{-- <script type="text/javascript">

   
$(document).ready(function(){

     $('.search').click(function(){

       var cityfrom = $('#cityform').val();
       var cityto = $('#cityto').val();
       var date = $('#date').val(); 



       $.ajax({
            url: "/search", 
            method: "post",  
            data:{cityfrom:cityfrom, cityto:cityto , date:date},  
            success:function(data){
                 // $('#show_cities').html(data);  
           }  

       });  

})
   

    

</script> --}}