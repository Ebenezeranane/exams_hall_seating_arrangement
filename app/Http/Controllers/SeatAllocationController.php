<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeatAllocation;
use App\Exams_hall;

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
        
        
        foreach ($halls as $hall) {
            if($request->input('hall') == $hall->hall_name){
                $rows = $hall->rows;
                $columns = $hall-> columns;
            }
        }
        
       
        $hall = $request->input('hall');

        for ($i=1; $i <= $rows ; $i++) { 
            
            for ($j=1; $j <= $columns ; $j++) { 
                if ($j%2==0){
                  $department = $request->input('allocate_department');
                   
               }else{
                   $department = $request->input('allocate_dept');
               }  
               $roll = 'Row'.$i.'Col'.$j;     
               array_push($data, ['roll'=>$roll, 'department'=> $department,'hall'=>$hall]);

          }
        }
        
        
       
        SeatAllocation::insert($data);
      
        alert()->success('Allocation made successfully.', 'Success!');
        return redirect('/admin');
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
        //
    }
}
