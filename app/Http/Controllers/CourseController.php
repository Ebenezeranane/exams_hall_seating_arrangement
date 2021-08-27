<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Admin;
use UxWeb\SweetAlert\SweetAlert;

class CourseController extends Controller
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
        //
        $admins = Admin::all();
        $courses = Course::all();
        return view('course.view_courses')->with('admins',$admins)->with('courses',$courses);

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
        return view('course.add_course')->with('admins',$admins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate form data 
        $request->validate([
             
           
            'course_name'=> 'required',
            'course_code'=>'required',
            'no_of_students'=> 'required',
            
        ]);


        //inserting data into the database 
        $course = new Course();
        $course->course_name= $request->input('course_name');
        $course->course_code = $request->input('course_code');
        $course->no_of_students= $request->input('no_of_students');
        $course->save();

        alert()->success('Course has been added successfully.', 'Success!');
 
         return redirect('/admin/course');

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
        $courses = Course::find($id);
        $admins = Admin::all();
       return view('course.edit_course')->with('admins',$admins)->with('courses',$courses);
   
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
            
            
            'course_name'=> 'required',
            'course_code'=>'required',
            'no_of_students'=> 'required',
            
        ]);
    
             //inserting data into the database 
            $course = Course::find($id);
            $course->course_name= $request->input('course_name');
            $course->course_code = $request->input('course_code');
            $course->no_of_students= $request->input('no_of_students');
            $course->save();
     
            return redirect('/admin/course')->with('success','course updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::find($id);
        $courses->delete();
        alert()->warning('Course deleted successfully ', 'Delete Course')->autoclose(5000);
        return redirect('/admin/course');
    
    }
}
