@extends('layouts.app')

<link href= "{{ asset('css/simple-sidebar1.css') }}" rel="stylesheet">

@section('content');
 {{-- sidebar --}}

<div class="page-wrapper toggled">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <a href="#" id="toggle-sidebar">
      <div class="sidebar-brand">
        <a href="#">WELCOME</a>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="" src="{{asset('images/admin.png')}}" alt="admin-profile" width="60px">
        </div>
        <div class="user-info">
          <span class="user-name">
           
          </span>

          <span class="user-role">Student</span>
          <div class="user-status">
            <a href="#">
             
              
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
            <a href="/admin"><i class="fa fa-dashboard"></i><span>USER DASHBOARD</span></a>
           
          </li>
          


        </ul>
      </div>
      <!-- sidebar-menu  -->
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    
  </nav>

  <main class="page-content">
    
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 ml-4">
                  <div class="card shadow-lg">
                    <div class="card-header text-white">
                     EXAMS INFORMATION
                   </div>
                   <div class="card-body">

                   </div>
                    </div>
                
                  </div>

                  <div class="col-md-5">
                    <div class="card shadow-lg">
                      <div class="card-header text-white">
                       PERSONAL INFORMATION
                     </div>

                     <div class="card-body">
                     
                    </div>
                      </div>
                  
                    </div>
           
                    </div>
                

       
    </div>

    <!--Map container-->
    <div class="container">
      
      <div id="map"></div>
      <script src="{{asset('js/map.js')}}">
       
      </script>

      

    </div>

  </main>


  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe4XsbEZxo2ZpyImFGfH_wNUzxI2Uivno&callback=initMap&libraries=&v=weekly"
  async
></script>
    <!-- Load sidebar Toggle Script -->
    <script src="{{ asset('/js/sidebar.js') }}">
    </script>  
@endsection
