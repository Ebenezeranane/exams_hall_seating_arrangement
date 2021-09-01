<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeatAllocation;
use App\Exams_hall;
use App\User;

class SeatAllocationController extends Controller
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
        $users = User::all();
        $halls = Exams_hall::all();
        $allocations = SeatAllocation::all();

        return view('allocation.view_allocation')->with('users',$users)->with('allocations',$allocations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Exams_hall::all();

        return view('allocation.make_allocation')->with('halls',$halls);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //seating arrangement 
        $data = [];
        $department = "";
        $halls = Exams_hall::all();
        $exam_date = $request->input('exam_date');
        $user_id = auth()->user()->id;
        
        
        foreach ($halls as $hall) {
            if($request->input('hall') == $hall->hall_name){
                $rows = $hall->rows;
                $columns = $hall-> columns;
            }
        }
        
        
        $hall = $request->input('hall');

        //make sure admin doesnt choose same course in allocation
        if ($request->input('allocate_department')==$request->input('allocate_dept')){
           
            alert()->error('Please department selection must be different.', 'Error!')->autoclose(5000); 
            return redirect('/admin/allocation/create');
         }else{
            for ($i=1; $i <= $rows ; $i++) { 
            
                for ($j=1; $j <= $columns ; $j++) { 
                    if ($j%2==0){
                      $department = $request->input('allocate_department');
                       
                   }else{
                       $department = $request->input('allocate_dept');
                   }  
    
                   
                   $roll = 'Row'.$i.'Col'.$j;     
                   array_push($data, ['roll'=>$roll, 'department'=> $department,'hall'=>$hall,'exam_date'=>$exam_date,'user_id'=>$user_id]);
    
              }
            }
            
            
           
            SeatAllocation::insert($data);
          
            alert()->success('Allocation made successfully.', 'Success!');
            return redirect('/admin/allocation');
         }  

       
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
        $allocations = SeatAllocation::find($id);
        $allocations->delete();
        
        alert()->warning('allocation deleted successfully','Delete allocation');
        return redirect('/admin/allocation');
    }
}
