<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invigilator;

class InvigilatorController extends Controller
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
        $invigilators = Invigilator::all();
        return view('invigilators.view_invigilators')->with('invigilators',$invigilators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invigilators.add_invigilator');
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
        $request->validate([
             
           
            'Invigilator_name'=> 'required',
            'e_mail'=>'required',
            'phone'=>'required',
            'department'=> 'required',
            'picture'=>'image|nullable|max:1999'
            
        ]);

        //handle the file upload 
      if ($request->hasFile('picture')) {

        $filenamewithExt = $request->file('picture')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $ext = $request->file('picture')->getClientOriginalExtension();

        $fileNameToStore =$filename.time().'.'.$ext;

        //upload the image 
        $path =$request->file('picture')->storeAs('public/pictures',$fileNameToStore);
        
    }else {
        
        $fileNameToStore ='noimage.jpg';
    }






        //inserting data into the database 
        $invigilator = new Invigilator();
        $invigilator->Invigilator_name= $request->input('Invigilator_name');
        $invigilator->e_mail = $request->input('e_mail');
        $invigilator->phone = $request->input('phone');
        $invigilator->picture = $fileNameToStore;
        $invigilator->department= $request->input('department');
        $invigilator->save();
        
        alert()->success('invigilator has been added successfully','Success');
         return redirect('/admin/invigilator');
    
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
        $invigilator = Invigilator::find($id);
        return view('invigilators.edit_invigilator')->with('invigilator',$invigilator);
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
        $request->validate([
             
           
            'Invigilator_name'=> 'required',
            'e_mail'=>'required',
            'phone'=>'required',
            'department'=> 'required',
            'picture'=>'image|nullable|max:1999'
            
        ]);

        //handle the file upload 
      if ($request->hasFile('picture')) {

        $filenamewithExt = $request->file('picture')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $ext = $request->file('picture')->getClientOriginalExtension();

        $fileNameToStore =$filename.time().'.'.$ext;

        //upload the image 
        $path =$request->file('picture')->storeAs('public/pictures',$fileNameToStore);
        
    }else {
        
        $fileNameToStore ='noimage.jpg';
    }






        //inserting data into the database 
        $invigilator = Invigilator::find($id);
        $invigilator->Invigilator_name= $request->input('Invigilator_name');
        $invigilator->e_mail = $request->input('e_mail');
        $invigilator->phone = $request->input('phone');
        $invigilator->picture = $fileNameToStore;
        $invigilator->department= $request->input('department');
        $invigilator->save();
        
        alert()->success('Invigilator has been updated successfully','Success');
         return redirect('/admin/invigilator');
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
        $invigilators = Invigilator::find($id);
        $invigilators->delete();
        
        alert()->warning('Invigilator deleted successfully','Delete invigilator');
        return redirect('/admin/invigilator');
    }
}
