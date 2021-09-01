
@extends('layouts.admin-app')

<link href= "{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

@section('content');
 {{-- sidebar --}}

<div class="page-wrapper toggled">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <a href="#" id="toggle-sidebar">
      <div class="sidebar-brand">
        <a href="#">ADMIN PANEL</a>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="" src="{{asset('images/admin.png')}}" alt="admin-profile" width="60px">
        </div>
        <div class="user-info">
          <span class="user-name">
           
          </span>

          <span class="user-role">Administrator</span>
          <div class="user-status">
            <a href="#">
           
              <span>Online</span></a>
          </div>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
      
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
         
          <li class="sidebar-dropdown">
            <a href="/admin"><i class="fa fa-dashboard"></i><span>ADMIN DASHBOARD</span></a>
           
          </li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="far fa-building"></i><span>DEPARTMENTS </span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/department">View All Departments<span class="badge"></span></a></li>
                <li><a href="/admin/department/create">Add new Department</a></li>
               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="fas fa-book"></i><span>MANAGE COURSES</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/course">View Courses</a></li>
                <li><a href="/admin/course/create">Add Course</a></li>              
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fas fa-eye"></i><span>INVIGILATORS </span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/invigilator">View Invigilators</a></li>
                <li><a href="/admin/invigilator/create">Add New Invigilator</a></li>              
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fas fa-user-graduate"></i><span>STUDENTS </span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/student">View All Students</a></li>
                         
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fas fa-school"></i><span>EXAMS HALLS<span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/halls">View Exams Halls</a></li>
                <li><a href="/admin/halls/create">Add Exams Hall</a></li>              
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fas fa-chair"></i><span>SEAT ALLOCATION<span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/allocation">Allocate seats </a></li>
                <li><a href="/admin/allocation/create">View Seats </a></li>              
              </ul>
            </div>
          </li>


        </ul>
      </div>
      <!-- sidebar-menu  -->
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <div class="row">
    
        <div class="col-md-8">


          {{-- admin dashboard --}}
          <div class="card  shadow-lg" style="height: 175px; width: 450px; background-color: rgb(252, 247, 247);color: purple;border-left:10px solid purple" >
             <div class="card-body ">
               <strong>Courses</strong><br>
   
               <span style="font-weight: bolder;font-size: 50px;">{{ count($courses)}}</span>
   
               <span class="float-right"><i class="fas fa-book fa-5x" style = "color: purple;opacity:0.5"></i></span>
             </div>
               </div>
 
 
               <div class="card   shadow-lg" style="height: 175px; width: 450px;position: relative;left: 480px;top: -175px;background-color:white;color: green;border-left:10px solid green">
             <div class="card-body">
               <strong>Departments</strong><br>
   
                <span style="font-weight: bolder;font-size: 50px;">{{ count($departments)}}</span>
   
               <span class="float-right"><i class="far fa-building fa-5x " style = "color:green;opacity: 0.5"></i></span>
               </div>
               </div>
               
               <div class="card shadow-lg" style="height: 175px; width: 450px;position: relative;left: 480px;top: -100px;background-color: white; color: blue;border-left:10px solid blue">
                <div class="card-body">
                  <strong>Halls</strong><br>
      
                  <span style="font-weight: bolder;font-size: 50px;">{{ count($halls)}}</span>
      
                   <span class="float-right"><i class="fas fa-school fa-5x" style = "color:blue;opacity: 0.5"></i></span>
                 
                  </div>
                  </div>
   
              
 
               <div class="card shadow-lg" style="height: 175px; width: 450px;position: relative;left: 5px;top: -278px;background-color: white; color: rgb(243, 60, 60);border-left:10px solid red">
                 <div class="card-body">
                   <strong>Invigilators</strong><br>
       
                   <span style="font-weight: bolder;font-size: 50px;">{{ count($invigilators)}}</span>
       
                    <span class="float-right"><i class="fas fa-eye fa-5x " style = "color: red;opacity: 0.5"></i></span>
                  
                   </div>
                   </div>
             
           </div>
   


       
    </div>


    <div class="container-fluid" style="position:relative;top:-160px">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow-sm">
            <div class="card-header bg-info text-white"> <strong>INVIGILATORS</strong>
            </div>
            <div class="card-body">
              @if(count($invigilators)>0)
              <table class="table  table-responsive-sm table-responsive-md">
                <thead>
                  <tr>
                    <th>#SN</th>
                    <th>Invigilator Name</th>
                    
                    <th>Phone</th>
                    <th>Picture</th>
                   
                    

                   
                    
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($invigilators as $invigilator)
                  <tr>
                    <td>{{ $invigilator->id }}</td>
                    <td>{{ $invigilator->Invigilator_name }}</td>
                    
                    <td>{{ $invigilator->phone }}</td>
                    <td><img style ="width: 80px;height:60px" src="/storage/pictures/{{ $invigilator->picture }}" alt="profile_pics"></td>


                   
                    
                
                    <td>
                      <a href="/admin/invigilator/{{ $invigilator->id }}/edit"><i class="fas fa-pen"></i></a>
                      
                    </td>
                    <td>
                      {!! Form::open(['action'=>['InvigilatorController@destroy',$invigilator->id],'method'=>'POST']) !!}
                      {!! Form::hidden('_method', 'DELETE' ) !!}
                      {!! Form::submit('DEL', ['class'=>'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <h3><strong>There are no Invigilators registered </strong></h3>
              @endif
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->



   

    <!-- Load sidebar Toggle Script -->
    <script src="{{ asset('/js/sidebar.js') }}">
    </script>










  
@endsection







































