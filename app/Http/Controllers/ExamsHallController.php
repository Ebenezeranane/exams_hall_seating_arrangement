<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams_hall;
use UxWeb\SweetAlert\SweetAlert;

class ExamsHallController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $halls =  Exams_hall::all();

        return view('halls.view_hall')->with('halls',$halls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halls.add_hall');
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
             
           
            'hall_name'=> 'required',
            'location'=>'required',
            'rows'=>'required',
            'columns'=> 'required',
            
        ]);
        //save the hall details into database 
        $hall = new Exams_hall();
        $hall->hall_name = $request->input('hall_name');
        $hall->location = $request->input('location');
        $hall->rows = $request->input('rows');
        $hall->columns= $request->input('columns');
        $hall->seat_capacity= $request->input('rows') * $hall->columns= $request->input('columns');
        
        $hall->save();
        alert()->success('Exams Hall has been added successfully','Success');
        return redirect('/admin/halls');



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
        $halls = Exams_hall::find($id);
        return view('halls.edit_hall')->with('halls',$halls);
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
             
           
            'hall_name'=> 'required',
            'location'=>'required',
            'rows'=>'required',
            'columns'=> 'required',
            
        ]);
        //save the hall details into database 
        $hall = Exams_hall::find($id);
        $hall->hall_name = $request->input('hall_name');
        $hall->location = $request->input('location');
        $hall->rows = $request->input('rows');
        $hall->columns= $request->input('columns');
        $hall->seat_capacity= $request->input('rows') * $hall->columns= $request->input('columns');
        
        $hall->save();
        alert()->success('Exams Hall has been updated successfully','Success');
        return redirect('/admin/halls');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hall =Exams_hall::find($id);
        $hall->delete();
        
        alert()->warning('Exams Hall deleted successfully','Delete Hall');
        return redirect('/admin/halls');
    }
}
