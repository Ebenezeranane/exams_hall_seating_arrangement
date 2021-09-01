
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
    
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card shadow-sm">
                  <div class="card-header text-dark"> <strong>INVIGILATORS</strong>
                    <a href="/admin/invigilator/create" class="btn  btn-sm pull-right icon-color"><i class="fas fa-plus-circle fa-2x"></i></a>
                  </div>
                  <div class="card-body">
                    @if(count($invigilators)>0)
                    <table class="table table-striped table-responsive-sm table-responsive-md">
                      <thead>
                        <tr>
                          <th>#SN</th>
                          <th>Invigilator Name</th>
                          <th>E Mail Address</th>
                          <th>Phone</th>
                          <th>Picture</th>
                          <th>Department</th>
                          

                         
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($invigilators as $invigilator)
                        <tr>
                          <td>{{ $invigilator->id }}</td>
                          <td>{{ $invigilator->Invigilator_name }}</td>
                          <td>{{ $invigilator->e_mail }}</td>
                          <td>{{ $invigilator->phone }}</td>
                          <td><img style ="width: 80px;height:60px" src="/storage/pictures/{{ $invigilator->picture }}" alt="profile_pics"></td>


                          <td>{{ $invigilator->department }}</td>
                          
                      
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
       
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->



   

    <!-- Load sidebar Toggle Script -->
    <script src="{{ asset('/js/sidebar.js') }}">
    </script>










  
@endsection







































