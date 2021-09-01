<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invigilator;
use App\Admin;
use App\Department;
use App\Exams_hall;
use App\SeatAllocation;
use App\Student;
use App\Course;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $invigilators = Invigilator::all();
        $departments = Department::all();
        $halls = Exams_hall::all();
        return view('admin')->with('courses',$courses)->with('invigilators',$invigilators)->with('departments',$departments)->with('halls',$halls);
    }
}
