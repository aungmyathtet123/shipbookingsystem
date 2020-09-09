<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
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
            'name' => 'required',

            'email' => 'required',
            'phone_no' => 'required',
            'note' => 'required',

        ]);

        
        // Store Data
        $booking = new Booking;
        $booking->name = $request->name;
        
        $booking->email = $request->email;
        $booking->phone_no = $request->phone_no;
        $booking->note = $request->note;

       

        $booking->save();

        // Redirect
        // Alert::success('Success!', 'New Category Inserted Successfully.');

        return redirect()->route('booking.index');
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
         $booking=Booking::find($id);
        return view('booking.edit',compact('booking'));
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
        $request->validate([
            
            'name' => 'required',
            'email' => 'required',

            'phone_no' => 'required',

            'note' => 'required',

            

        ]);
        
        $booking = Booking::find($id);
        
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone_no = $request->phone_no;
        $booking->note = $request->note;

        

        $booking->save();

        

        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);

        $booking->delete();

        // Alert::success('Success!', 'Category Deleted Successfully.');
        
        return redirect()->route('booking.index');  
    }
}
