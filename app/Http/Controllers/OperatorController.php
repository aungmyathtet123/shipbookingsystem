<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;


class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::all();
        
        return view('operator.index',compact('operators'));  

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.create');
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
            'photo' => 'required',
        ]);

        // File Upload
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backendtemplate/operatorimg'),$imageName);
        $myfile = 'backendtemplate/operatorimg/'.$imageName;

        // Store Data
        $operator = new Operator;
        $operator->name = $request->name;
        $operator->photo = $myfile;

        $operator->save();

        // Redirect
        // Alert::success('Success!', 'New Category Inserted Successfully.');

        return redirect()->route('operator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('operator.show');
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operator=Operator::find($id);
        return view('operator.edit',compact('operator'));
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
            // 'photo' => 'required',
            // may be present or absent

        ]);

        

        // File Upload
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();

            $request->photo->move(public_path('backendtemplate/operatorimg'),$imageName);
            $myfile = 'backendtemplate/operatorimg/'.$imageName;
        }

        // if upload new image, delete old image;
        
        

        // Update Data
        $operator = Operator::find($id);
        // dd($category);
        $operator->name = $request->name;
        if ($request->hasFile('photo')) {
                File::delete($operator->photo);
                $operator->photo = $myfile;  
            }else{
                $operator->photo = $operator->photo;
            }

        $operator->save();

        // Redirect
        // Alert::success('Success!', 'Category Updated Successfully.');

        return redirect()->route('operator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = Operator::find($id);

        $operator->delete();

        // Alert::success('Success!', 'Category Deleted Successfully.');
        
        return redirect()->route('operator.index');
    }
}
