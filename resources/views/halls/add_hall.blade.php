
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
                <li><a href="/admin/blood-info">View All Students</a></li>
                         
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
                <li><a href="/admin/">Allocate seats </a></li>
                <li><a href="/admin/create">View Seats </a></li>              
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
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="card shadow-sm">
                    <div class="card-header text-dark">
                      <strong>ADD EXAM HALL</strong>
                      <span class="pull-right"><i class="fas fa-school fa-2x icon-color"></i></span>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        {!! Form::open(['method'=>'POST','action'=>'ExamsHallController@store']) !!}
           
                       
                  
                              
                       
                        Hall Name
                           {!! Form::text('hall_name','', ['class'=>'form-control','placeholder'=>'Hall Name','required'=>'required']) !!} <br>
           
           
                        Location 
                           {!! Form::text('location','', ['class'=>'form-control','placeholder'=>'location','required'=>'required']) !!} <br>
              
                           Rows
                           {!! Form::number('rows','', ['class'=>'form-control','placeholder'=>'enter number of rows','required'=>'required']) !!} <br>
                  
                    
                          Columns
                           {!! Form::number('columns','', ['class'=>'form-control','placeholder'=>'enter number of columns','required'=>'required']) !!} <br>
                  
                  
                  {!! Form::submit('add', ['class'=>'btn btn-primary mt-3 ','required'=>'required']) !!} 
           
                         {!! Form::close() !!}  
                   </div>
                    </div>
                
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







































