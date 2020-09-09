<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Ship;
use App\Route;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes=Route::all();
        return view('routes.index',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        $ships=Ship::all();
        return view('routes.create',compact('cities','ships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
             
            'city_from' => 'required',
            'city_to' => 'required',
            'ship_id' => 'required',
            'time' => 'required',
            'upper_price' => 'required',
            'lower_price' => 'required',



        ]);
        //Store Data
        $route= new Route;
        $route->city_from=$request->city_from;
        $route->city_to=$request->city_to;
        $route->ship_id=$request->ship_id;
        $route->time=$request->time;
        $route->lower_price=$request->lower_price;
        $route->upper_price=$request->upper_price;
        $route->save();
        return redirect()->route('routes.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);

        $route->delete();

        // Alert::success('Success!', 'Category Deleted Successfully.');
        
        return redirect()->route('routes.index');
    }
}
