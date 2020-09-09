<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Ship;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships=Ship::all();
        // $operators=Operator::all();
        return view('ship.index',compact('ships'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operators=Operator::all();
        return view('ship.create',compact('operators'));
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
             // 'operator_id' => 'required',
            'max_upseat' => 'required',
            'max_lowseat' => 'required',

        ]);

        // File Upload
        

        // Store Data
        $ship = new Ship;
        $ship->operator_id = $request->operator_id;
        $ship->max_upseat = $request->max_upseat;
        $ship->max_lowseat = $request->max_lowseat;
        

        $ship->save();

        // Redirect
        // Alert::success('Success!', 'New Brand Inserted Successfully.');

        return redirect()->route('ship.index');    }

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
        $ship=Ship::find($id);
        $operators=Operator::all();
        return view('ship.edit',compact('ship','operators'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            
            'max_upseat' => 'required',
            'max_lowseat' => 'required',

            

        ]);
        // Update Data
        $ship = Ship::find($id);
        // dd($category);
        $ship->operator_id = $request->operator_id;
        $ship->max_upseat = $request->max_upseat;
        $ship->max_lowseat = $request->max_lowseat;


        

        $ship->save();

        

        return redirect()->route('ship.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ship = Ship::find($id);

        $ship->delete();

        // Alert::success('Success!', 'Category Deleted Successfully.');
        
        return redirect()->route('ship.index');    
            }
}
