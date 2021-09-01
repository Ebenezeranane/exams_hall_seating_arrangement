<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Department;

class DepartmentController extends Controller
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
        $admins = Admin::all();
        $departments = department::all();
        return view('departments.view_department')->with('admins',$admins)->with('departments',$departments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $admins = Admin::all();
        return view('departments.add_department')->with('admins',$admins);
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
             
           
            'department_name'=> 'required',
            'department_code'=>'required',
            'department_head'=>'required',
            'no_of_students'=> 'required',
            
        ]);

        //inserting data into the database 
        $department = new department();
        $department->department_name= $request->input('department_name');
        $department->department_code = $request->input('department_code');
        $department->department_head = $request->input('department_head');
        $department->no_of_students= $request->input('no_of_students');
        $department->save();
        
        alert()->success('Department has been added successfully','Success');
         return redirect('/admin/department');
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
        $departments = Department::find($id);
        $admins = Admin::all();
       return view('departments.edit_department')->with('admins',$admins)->with('departments',$departments);
   
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
        //validate form data 
        $request->validate([
            
            
            'department_name'=> 'required',
            'department_code'=>'required',
            'department_head'=>'required',
            'no_of_students'=> 'required',
            
        ]);
    
             //inserting data into the database 
            $department = department::find($id);
            $department->department_name= $request->input('department_name');
            $department->department_code = $request->input('department_code');
            $department->department_head = $request->input('department_head');
            $department->no_of_students= $request->input('no_of_students');
            $department->save();
            
            alert()->success('Department has been updated successfully','Success');
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
        $departments = department::find($id);
        $departments->delete();
        
        alert()->warning('Department deleted successfully','Delete Department');
        return redirect('/admin/department');
    }
}
