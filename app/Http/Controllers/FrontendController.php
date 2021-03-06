<?php

namespace App\Http\Controllers;
use App\City;
use App\Route;
use App\Operator;
use App\Booking;
use App\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	$cities = City::all();
        $operators=Operator::all();
    	return view('frontend.home',compact('cities','operators'));
    }

    public function search(Request $request)
    {
    // dd($request);
    $from = City::findOrFail($request->city_from);
    // dd($from);
    $to = City::findOrFail($request->city_to);

    $city_from = request('city_from');
    $city_to = request('city_to');
     $cities = City::all();
    $date=$request->date;
    $routes=Route::where([["city_from",$city_from],["city_to",$city_to]])->get();
    // dd($routes);


    // foreach ($routes as $ship) {
       
    //     $operators=$ship->Ship->Operator;
        
    //     // $operator_name=$operators[0]->name;
        
            
    //     }

    //      dd($routes[0]->Ship->Operator);

       
     return view('frontend.search',compact('routes','cities','from','to','date'));



    }
    public function seat($id, $type,$date)
    {
   // dd($date);

       
      $date=$date;
    $route = Route::find($id);
    // dd($route);
    $occupySeats = DB::table('bookingdetail')->where('route_id', $id)->get();
    $occupySeatsArray = [];

    foreach ($occupySeats as $key => $value) {
        $array = explode(',', $value->seat);
        
        for($i = 0; $i < sizeof($array); $i++){
            array_push($occupySeatsArray, $array[$i]);
        }
    }
    $type = $type;

     $from = City::findOrFail($route->city_from);
    $to = City::findOrFail($route->city_to);


      return view('frontend.seat', compact('route','type','from','to', 'occupySeatsArray','date'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $route_id = $request->route_id;
        $opname = $request->opname;
        $routename =  $request->routename;
        $time =  $request->time;
        $subtotal =  $request->subtotal;
        $seatnumber =  $request->seatnumber;
        $date=request('date');
        // $date=request('date');
        // dd($date);
        $bookings=Booking::all();
        // dd($bookings);

       return view('frontend.booking', compact('route_id','time', 'routename', 'opname', 'subtotal', 'seatnumber','date','bookings'));
    }

    public function bookingstore(Request $request)
    {
        
        

        // $string=implode($arr);
        // dd($request);

       $booking=new Booking;
       $booking->name=$request->name;
       $booking->email=$request->email;
        $booking->phone_no=$request->phone_no;
       $booking->note=$request->note;
       $booking->save();
       
       $booking->routes()->attach($request->route_id, [
    //you can pass any other pivot filed value you want in here
    'seat' => $request->seatnumber,
    'date' => $request->date,
    ]);
       return 'Your Order Successful!';
       
    }


    public function editsearch(Request $request)
    {
      
       // dd($request);
        $from=request('from');
        $to=request('to');
        $date=request('date');
       // dd($from,$to,$date);
        $routes=Route::where([["city_from",$from],["city_to",$to]])->get();
        // dd($route);

        $from=City::findOrFail($request->from);
        $to=City::findOrFail($request->to);

        foreach ($routes as $route) {
        
        $routename=$route->Ship->Operator->name;
        // $route=$route;

        
    }

        return[$routes,$from,$to,$routename,$date];
    }


public function filter(Request $request)
{
    // dd($request);

     $from=request('from');
        $to=request('to');
        $id=request('id');
        $date=request('date');

        $routes=Route::where("ship_id",$id)->get();
        // $operators=Operator::where("id",$id)->get();


         $from=City::findOrFail($request->from);
        $to=City::findOrFail($request->to);

        if ($id==0) {
      $operators=Operator::all();
      }else{
         $operators=Ship::find($id)->Operator;
      }
      return [$routes,$operators,$from,$to,$date];
   

}

    

    
    }





